<?php
namespace Events\Controller;

use Events\Form\AddEventForm;
use Events\Form\EditEventForm;
use Application\Constants\MessageConstants;
use Application\Constants\EventVenueStatusConstants;

class EventsController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	public function addAction() {
		$eventModel = $this->getSessionEventsMapper()->fetchModel(); /*@var $eventModel \Events\Model\EventModel */
		$venueId = $this->params('venueId');
		if (isset($venueId)) $eventModel->venue_id = $venueId;

		$this->setReturnParams(
			array(
				'eventModel'	=>	$eventModel
		));

		if (!$this->getRequest()->isPost()) return $this->getReturnParams();

		$addEventForm = new AddEventForm($this->getRequest()->getPost('addEventForm'));
		if (!$addEventForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }

		$addEventFormData = $addEventForm->getData();
		$processResult = $this->getEventsProcess()->setEventPropertiesFromFormData($eventModel, $addEventFormData);
		$eventModel = $processResult->data;

		$memberModel = $this->getLoggedInMember();
		if (isset($memberModel)) $eventModel->member_id = $memberModel->id;

		$this->getEventsProcess()->saveModel($eventModel);

		$this->redirect()->toRoute('events/review');
	}

	public function editAction() {
		$eventModel = $this->getEventModel();
		if (!$eventModel) { $this->nwFlashMessenger()->addErrorMessage("Your event cannot be located for editting. Please fill out your event information again."); return $this->redirect()->toRoute('events/add'); }

		$this->setReturnParams(array(
			'eventModel' =>	$eventModel
		));

		if (!$this->getRequest()->isPost()) return $this->getReturnParams();

		$editEventForm = new EditEventForm($this->getRequest()->getPost('editEventForm'));
		if (!$editEventForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }
		$editEventFormData = $editEventForm->getData();

		$processResult = $this->getEventsProcess()->setEventPropertiesFromFormData($eventModel, $editEventFormData);
		$eventModel = $processResult->data;

		if ($eventModel->id) {
			$processResult = $this->getEventsProcess()->updateModel($eventModel);
			if ($processResult->success) return $this->redirect()->toRoute('events/review', ['eventId' => $eventModel->id]);
			else {
				$this->nwFlashMessenger()->addErrorMessage($processResult->message);
				return $this->getReturnParams();
			}
		} else {
			$this->getSessionEventsMapper()->saveModel($eventModel);
			return $this->redirect()->toRoute('events/review');
		}
	}

	public function reviewAction() {
		$eventModel = $this->getEventModel(); /*@var $eventModel \Events\Model\EventModel */
		if (!$eventModel || !$eventModel->venue_id) { $this->nwFlashMessenger()->addErrorMessage("You cannot navigate back to the review page after submitting an event. Go to \"My Events\" or to the home page to view your event in greater detail."); return $this->redirect()->toRoute('home'); }

		if ($eventModel->venue_id) { $venueModel = $this->getVenuesMapper()->fetchOneForId($eventModel->venue_id);
		} else $venueModel = $this->getSessionVenuesMapper()->fetchModel();
		if (!$venueModel) throw new \Exception("Venue: {$eventModel->venue_id} cannot be found.");

		$addressOriginal = $venueModel['address_1'].',+'.$venueModel['address_2'].',+'.$venueModel['city'].',+'.$venueModel['state'].'+'.$venueModel['postal_code'].',+'.$venueModel['country'];
		$addressWhiteSpaceRemoved = str_replace(['	', '    ', '   ', '  ', ' '], '+', $addressOriginal);
		$addressTrimmed = str_replace(',+,+', ',+', $addressWhiteSpaceRemoved);
		$addressCleaned = str_replace("'", '', $addressTrimmed);

		$url = "//maps.googleapis.com/maps/api/staticmap?center=$addressCleaned&zoom=13&size=600x300&maptype=roadmap&markers=$addressCleaned&sensor=false";

		return array(
			'eventModel'			=>	$eventModel,
			'url'					=>	$url,
		);
	}

	public function approveAction() {
		$eventModel = $this->getEventModel();
		if (!$eventModel) { $this->nwFlashMessenger()->addErrorMessage("Your event cannot be located for approval. Please fill out your event information again."); return $this->redirect()->toRoute('events/add'); }

		$eventModel->status = EventVenueStatusConstants::PENDING_APPROVAL;

		if ($eventModel->id) {
			$processResult = $this->getEventsProcess()->updateModel($eventModel); /*@var $processResult \NovumWare\Process\ProcessResult */
			if ($processResult->success) $this->nwFlashMessenger()->addSuccessMessage("You have successfully updated your event");
		} else {
			$processResult = $this->getEventsProcess()->insertModel($eventModel); /*@var $processResult \NovumWare\Process\ProcessResult */
			if ($processResult->success) $this->nwFlashMessenger()->addSuccessMessage("You have successfully added an event to our site!");
		}

		if ($processResult->success) $this->getEventsProcess()->sendApprovalEmailToAdmin($eventModel);
		else $this->nwFlashMessenger()->addErrorMessage($processResult->message);

		return $this->redirect()->toRoute('home');
	}

	public function archiveAction() {
		$id = $this->params('eventId');
		$eventModel = $this->getEventsMapper()->fetchOneForId($id); /*@var $eventModel \Events\Model\EventModel */
		if (!$eventModel) { $this->nwFlashMessenger()->addErrorMessage("Your event cannot be located."); return $this->redirect()->toRoute('home'); }

		$eventModel->status = EventVenueStatusConstants::ARCHIVED;
		$this->getEventsMapper()->updateModel($eventModel);
		$this->nwFlashMessenger()->addSuccessMessage("You have successfully removed your event from our site.");

		return $this->redirect()->toRoute('home');
	}

	public function renewAction() {
		$id = $this->params('eventId');
		$eventModel = $this->getEventsMapper()->fetchOneForId($id); /*@var $eventModel \Events\Model\EventModel */
		if (!$eventModel) { $this->nwFlashMessenger()->addErrorMessage("Your event cannot be located."); return $this->redirect()->toRoute('home'); }

		$eventModel->status = EventVenueStatusConstants::PENDING_APPROVAL;
		$dateTime = new \DateTime($eventModel->end_date);
		$dateTime->add(new \DateInterval('P1Y'));
		$eventModel->end_date = $dateTime->format('Y-m-d');
		$this->getEventsMapper()->updateModel($eventModel);
		$this->nwFlashMessenger()->addSuccessMessage("You have successfully renewed your event.");

		return $this->redirect()->toRoute('home');
	}


	// =================================================================== HELPER METHODS ============================================================================
	/**
	 * @return \Events\Model\EventModel
	 */
	private function getEventModel() {
		$params = $this->params('eventId');
		$memberModel = $this->getLoggedInMember();

		if (isset($params)) {
			$eventModel = $this->getEventsMapper()->fetchOneForId($params);  /*@var $eventModel \Events\Model\EventModel */
		} else $eventModel = $this->getSessionEventsMapper()->fetchModel();

		if (isset($eventModel->member_id)) $this->checkMemberAgainstEventModel($memberModel, $eventModel);

		return $eventModel;
	}

	/**
	 * @param \Registration\Model\MemberModel $memberModel
	 * @param \Events\Model\EventModel $eventModel
	 */
	private function checkMemberAgainstEventModel($memberModel, $eventModel) {
		if (!$memberModel) {
			$this->nwFlashMessenger()->addMessage("You must login to review {$eventModel->id}.");
			return $this->redirect()->toRoute('login');
		}
		if ($memberModel->role == 'admin') return;
		if ($memberModel->id != $eventModel->member_id) $this->throwExceptionForEvent($eventModel);
	}

	/**
	 * @param \Events\Model\EventModel $eventModel
	 */
	private function throwExceptionForEvent($eventModel) {
		throw new \Exception("You are not authorized to access event: {$eventModel->id}. Please make sure you are logged in.");
	}


	// =================================================================== FACTORY METHODS ============================================================================
	/**
	 * @return \Events\Mapper\EventsMapper
	 */
	private function getEventsMapper() {
		if (!isset($this->_eventsMapper)) $this->_eventsMapper = $this->getServiceLocator()->get('\Events\Mapper\EventsMapper');
		return $this->_eventsMapper;
	}

	/**
	 * @return \Events\Mapper\SessionEventsMapper
	 */
	private function getSessionEventsMapper() {
		if (!isset($this->_sessionEventsMapper)) $this->_sessionEventsMapper = $this->getServiceLocator()->get('\Events\Mapper\SessionEventsMapper');
		return $this->_sessionEventsMapper;
	}

	/**
	 * @return \Venues\Mapper\VenuesMapper
	 */
	private function getVenuesMapper() {
		if (!isset($this->_venuesMapper)) $this->_venuesMapper = $this->getServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_venuesMapper;
	}

	/**
	 * @return \Events\Process\EventsProcess
	 */
	private function getEventsProcess() {
		if (!isset($this->_eventsProcess)) $this->_eventsProcess = $this->getServiceLocator()->get('\Events\Process\EventsProcess');
		return $this->_eventsProcess;
	}
}