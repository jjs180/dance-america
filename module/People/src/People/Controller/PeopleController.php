<?php
namespace People\Controller;

use People\Form\AddPersonForm;
use People\Form\EditPersonForm;
use Application\Constants\MessageConstants;
use Application\Constants\PersonVenueStatusConstants;

class PeopleController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	public function addAction() {
		$personModel = $this->getSessionPeopleMapper()->fetchModel(); /*@var $personModel \People\Model\PersonModel */
		$venueId = $this->params('venueId');
		if (isset($venueId)) $personModel->venue_id = $venueId;

		$this->setReturnParams(
			array(
				'personModel'	=>	$personModel
		));

		if (!$this->getRequest()->isPost()) return $this->getReturnParams();

		$addPersonForm = new AddPersonForm($this->getRequest()->getPost('addPersonForm'));
		if (!$addPersonForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }

		$addPersonFormData = $addPersonForm->getData();
		$processResult = $this->getPeopleProcess()->setPersonPropertiesFromFormData($personModel, $addPersonFormData);
		$personModel = $processResult->data;

		$memberModel = $this->getLoggedInMember();
		if (isset($memberModel)) $personModel->member_id = $memberModel->id;

		$this->getPeopleProcess()->saveModel($personModel);

		$this->redirect()->toRoute('people/review');
	}

	public function editAction() {
		$personModel = $this->getPersonModel();
		if (!$personModel) { $this->nwFlashMessenger()->addErrorMessage("Your person cannot be located for editting. Please fill out your person information again."); return $this->redirect()->toRoute('people/add'); }

		$this->setReturnParams(array(
			'personModel' =>	$personModel
		));

		if (!$this->getRequest()->isPost()) return $this->getReturnParams();

		$editPersonForm = new EditPersonForm($this->getRequest()->getPost('editPersonForm'));
		if (!$editPersonForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }
		$editPersonFormData = $editPersonForm->getData();

		$processResult = $this->getPeopleProcess()->setPersonPropertiesFromFormData($personModel, $editPersonFormData);
		$personModel = $processResult->data;

		if ($personModel->id) {
			$processResult = $this->getPeopleProcess()->updateModel($personModel);
			if ($processResult->success) return $this->redirect()->toRoute('people/review', ['personId' => $personModel->id]);
			else {
				$this->nwFlashMessenger()->addErrorMessage($processResult->message);
				return $this->getReturnParams();
			}
		} else {
			$this->getSessionPeopleMapper()->saveModel($personModel);
			return $this->redirect()->toRoute('people/review');
		}
	}

	public function reviewAction() {
		$personModel = $this->getPersonModel(); /*@var $personModel \People\Model\PersonModel */
		if (!$personModel || !$personModel->venue_id) { $this->nwFlashMessenger()->addErrorMessage("You cannot navigate back to the review page after submitting an person. Go to \"My People\" or to the home page to view your person in greater detail."); return $this->redirect()->toRoute('home'); }

		if ($personModel->venue_id) { $venueModel = $this->getVenuesMapper()->fetchOneForId($personModel->venue_id);
		} else $venueModel = $this->getSessionVenuesMapper()->fetchModel();
		if (!$venueModel) throw new \Exception("Venue: {$personModel->venue_id} cannot be found.");

		$addressOriginal = $venueModel['address_1'].',+'.$venueModel['address_2'].',+'.$venueModel['city'].',+'.$venueModel['state'].'+'.$venueModel['postal_code'].',+'.$venueModel['country'];
		$addressWhiteSpaceRemoved = str_replace(['	', '    ', '   ', '  ', ' '], '+', $addressOriginal);
		$addressTrimmed = str_replace(',+,+', ',+', $addressWhiteSpaceRemoved);
		$addressCleaned = str_replace("'", '', $addressTrimmed);

		$url = "//maps.googleapis.com/maps/api/staticmap?center=$addressCleaned&zoom=13&size=600x300&maptype=roadmap&markers=$addressCleaned&sensor=false";

		return array(
			'personModel'			=>	$personModel,
			'url'					=>	$url,
		);
	}

	public function approveAction() {
		$personModel = $this->getPersonModel();
		if (!$personModel) { $this->nwFlashMessenger()->addErrorMessage("Your person cannot be located for approval. Please fill out your person information again."); return $this->redirect()->toRoute('people/add'); }

		$personModel->status = PersonVenueStatusConstants::PENDING_APPROVAL;

		if ($personModel->id) {
			$processResult = $this->getPeopleProcess()->updateModel($personModel); /*@var $processResult \NovumWare\Process\ProcessResult */
			if ($processResult->success) $this->nwFlashMessenger()->addSuccessMessage("You have successfully updated your person");
		} else {
			$processResult = $this->getPeopleProcess()->insertModel($personModel); /*@var $processResult \NovumWare\Process\ProcessResult */
			if ($processResult->success) $this->nwFlashMessenger()->addSuccessMessage("You have successfully added an person to our site!");
		}

		if ($processResult->success) $this->getPeopleProcess()->sendApprovalEmailToAdmin($personModel);
		else $this->nwFlashMessenger()->addErrorMessage($processResult->message);

		return $this->redirect()->toRoute('home');
	}

	public function archiveAction() {
		$id = $this->params('personId');
		$personModel = $this->getPeopleMapper()->fetchOneForId($id); /*@var $personModel \People\Model\PersonModel */
		if (!$personModel) { $this->nwFlashMessenger()->addErrorMessage("Your person cannot be located."); return $this->redirect()->toRoute('home'); }

		$personModel->status = PersonVenueStatusConstants::ARCHIVED;
		$this->getPeopleMapper()->updateModel($personModel);
		$this->nwFlashMessenger()->addSuccessMessage("You have successfully removed your person from our site.");

		return $this->redirect()->toRoute('home');
	}

	public function renewAction() {
		$id = $this->params('personId');
		$personModel = $this->getPeopleMapper()->fetchOneForId($id); /*@var $personModel \People\Model\PersonModel */
		if (!$personModel) { $this->nwFlashMessenger()->addErrorMessage("Your person cannot be located."); return $this->redirect()->toRoute('home'); }

		$personModel->status = PersonVenueStatusConstants::PENDING_APPROVAL;
		$dateTime = new \DateTime($personModel->end_date);
		$dateTime->add(new \DateInterval('P1Y'));
		$personModel->end_date = $dateTime->format('Y-m-d');
		$this->getPeopleMapper()->updateModel($personModel);
		$this->nwFlashMessenger()->addSuccessMessage("You have successfully renewed your person.");

		return $this->redirect()->toRoute('home');
	}


	// =================================================================== HELPER METHODS ============================================================================
	/**
	 * @return \People\Model\PersonModel
	 */
	private function getPersonModel() {
		$params = $this->params('personId');
		$memberModel = $this->getLoggedInMember();

		if (isset($params)) {
			$personModel = $this->getPeopleMapper()->fetchOneForId($params);  /*@var $personModel \People\Model\PersonModel */
		} else $personModel = $this->getSessionPeopleMapper()->fetchModel();

		if (isset($personModel->member_id)) $this->checkMemberAgainstPersonModel($memberModel, $personModel);

		return $personModel;
	}

	/**
	 * @param \Registration\Model\MemberModel $memberModel
	 * @param \People\Model\PersonModel $personModel
	 */
	private function checkMemberAgainstPersonModel($memberModel, $personModel) {
		if (!$memberModel) {
			$this->nwFlashMessenger()->addMessage("You must login to review {$personModel->id}.");
			return $this->redirect()->toRoute('login');
		}
		if ($memberModel->role == 'admin') return;
		if ($memberModel->id != $personModel->member_id) $this->throwExceptionForPerson($personModel);
	}

	/**
	 * @param \People\Model\PersonModel $personModel
	 */
	private function throwExceptionForPerson($personModel) {
		throw new \Exception("You are not authorized to access person: {$personModel->id}. Please make sure you are logged in.");
	}


	// =================================================================== FACTORY METHODS ============================================================================
	/**
	 * @return \People\Mapper\PeopleMapper
	 */
	private function getPeopleMapper() {
		if (!isset($this->_peopleMapper)) $this->_peopleMapper = $this->getServiceLocator()->get('\People\Mapper\PeopleMapper');
		return $this->_peopleMapper;
	}

	/**
	 * @return \People\Mapper\SessionPeopleMapper
	 */
	private function getSessionPeopleMapper() {
		if (!isset($this->_sessionPeopleMapper)) $this->_sessionPeopleMapper = $this->getServiceLocator()->get('\People\Mapper\SessionPeopleMapper');
		return $this->_sessionPeopleMapper;
	}

	/**
	 * @return \Venues\Mapper\VenuesMapper
	 */
	private function getVenuesMapper() {
		if (!isset($this->_venuesMapper)) $this->_venuesMapper = $this->getServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_venuesMapper;
	}

	/**
	 * @return \People\Process\PeopleProcess
	 */
	private function getPeopleProcess() {
		if (!isset($this->_peopleProcess)) $this->_peopleProcess = $this->getServiceLocator()->get('\People\Process\PeopleProcess');
		return $this->_peopleProcess;
	}
}