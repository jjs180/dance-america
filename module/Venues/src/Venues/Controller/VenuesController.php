<?php
namespace Venues\Controller;

use Venues\Form\AddVenueForm;
use Venues\Form\EditVenueForm;
use Venues\Form\SearchVenuesForm;
use Application\Constants\MessageConstants;
use Application\Constants\EventVenueStatusConstants;

class VenuesController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	public function searchAction() {
		$eventId = $this->params('eventId');

		$this->setReturnParams(array(
			'eventId'		=>	$eventId,
		));

		if (!$this->getRequest()->isPost()) return $this->getReturnParams();

		$searchVenuesForm = new SearchVenuesForm($this->getRequest()->getPost('searchVenuesForm'));
		if (!$searchVenuesForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }

		$searchVenuesFormData = $searchVenuesForm->getData();

		$params = array(
			'eventId'			=>	$searchVenuesFormData['event_id'],
			'searchCriteria'	=>	$searchVenuesFormData['search_criteria'],
			'searchPhrase'		=>	$searchVenuesFormData['search_param']
		);

		return $this->redirect()->toRoute('venues/search/results', $params);
	}

	public function resultsAction() {
		$eventId = $this->params('eventId');
		$searchCriteria = $this->params('searchCriteria');
		$searchPhrase = $this->params('searchPhrase');

		if ($searchCriteria =='name') $venueModelsArray = $this->getVenuesMapper()->fetchManyForName($searchPhrase);
		elseif ($searchCriteria == 'city') $venueModelsArray = $this->getVenuesMapper()->fetchManyForCity($searchPhrase);
		elseif ($searchCriteria == 'state') $venueModelsArray = $this->getVenuesMapper()->fetchManyForState($searchPhrase);
		elseif ($searchCriteria == 'postal code') $venueModelsArray = $this->getVenuesMapper()->fetchManyForPostalCode($searchPhrase);
		elseif ($searchCriteria == 'country') $venueModelsArray = $this->getVenuesMapper()->fetchManyForCountry($searchPhrase);
		else throw new \Exception('You are not searching with valid criteria');

		return array(
			'searchCriteria'	=>	$searchCriteria,
			'searchPhrase'		=>	$searchPhrase,
			'venueModelsArray'	=>	$venueModelsArray,
			'eventId'			=>	$eventId
		);
	}

	public function addAction() {
		$venueModel = $this->getSessionVenuesMapper()->fetchModel(); /*@var $venueModel \Venues\Model\VenueModel */

		$this->setReturnParams(array(
			'venueModel'	=>	$venueModel
		));

		if (!$this->getRequest()->isPost()) return $this->getReturnParams();

		$addVenueForm = new AddVenueForm($this->getRequest()->getPost('addVenueForm'));
		if (!$addVenueForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }

		$addVenueFormData = $addVenueForm->getData();
		$processResult = $this->getVenuesProcess()->setVenuePropertiesFromForm($venueModel, $addVenueFormData); /*@var $processResult \NovumWare\Process\ProcessResult */
		if ($processResult->success) {
			$venueModel = $processResult->data;
			$memberModel = $this->getLoggedInMember();
			if (isset($memberModel)) $venueModel->member_id = $memberModel->id;
			$this->getSessionVenuesMapper()->saveModel($venueModel);

			return $this->redirect()->toRoute('venues/review');
		} else {
			$this->nwFlashMessenger()->addErrorMessage($processResult->message);
			return $this->getReturnParams();
		}
	}

	public function editAction() {
		$venueModel = $this->getVenueModel();
		if (!$venueModel) { $this->nwFlashMessenger()->addErrorMessage("Your venue cannot be located for editting. Please fill out your venue information again."); return $this->redirect()->toRoute('venues/add'); }

		$this->setReturnParams(array(
			'venueModel'	=>	$venueModel
		));

		if (!$this->getRequest()->isPost()) return $this->getReturnParams();
		$editVenueForm = new EditVenueForm($this->getRequest()->getPost('editVenueForm'));
		if (!$editVenueForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }

		$editVenueFormData = $editVenueForm->getData();
		$processResult = $this->getVenuesProcess()->setVenuePropertiesFromForm($venueModel, $editVenueFormData); /* @var $processResult \NovumWare\Process\ProcessResult */
		if ($processResult->success) {
			$venueModel = $processResult->data;
			if ($venueModel->id) {
				$this->getVenuesMapper()->updateModel($venueModel);
				return $this->redirect()->toRoute('venues/review', ['venueId' => $venueModel->id]);
			}
			else {
				 $this->getSessionVenuesMapper()->saveModel($venueModel);
				 return $this->redirect()->toRoute('venues/review');
			}
		} else {
			$this->nwFlashMessenger()->addErrorMessage($processResult->message);
			return $this->getReturnParams();
		}
	}

	public function reviewAction() {
		$venueModel = $this->getVenueModel();
		if (!$venueModel) { $this->nwFlashMessenger()->addErrorMessage("You cannot navigate back to the review page after submitting a venue. Go to \"My Venues\" or to the home page to view your venue in greater detail."); return $this->redirect()->toRoute('home'); }

		$addressOriginal = $venueModel->address_1.',+'.$venueModel->address_2.',+'.$venueModel->city.',+'.$venueModel->state.'+'.$venueModel->postal_code.',+'.$venueModel->country;
		$addressWhiteSpaceRemoved = str_replace(['	', '    ', '   ', '  ', ' '], '+', $addressOriginal);
		$addressTrimmed = str_replace(',+,+', ',+', $addressWhiteSpaceRemoved);
		$addressCleaned = str_replace("'", '', $addressTrimmed);
		$url = "http://maps.googleapis.com/maps/api/staticmap?center=$addressCleaned&zoom=13&size=600x300&maptype=roadmap&markers=$addressCleaned&sensor=false";

		return array(
			'url'					=>	$url,
			'venueModel'			=>	$venueModel
		);
	}

	public function viewAction() {
		$venueModel = $this->getVenueModel();
		if (!$venueModel) { $this->nwFlashMessenger()->addErrorMessage("Unable to find your venue."); return $this->redirect()->toRoute('home'); }

		$addressOriginal = $venueModel->address_1.',+'.$venueModel->address_2.',+'.$venueModel->city.',+'.$venueModel->state.'+'.$venueModel->postal_code.',+'.$venueModel->country;
		$addressWhiteSpaceRemoved = str_replace(['	', '    ', '   ', '  ', ' '], '+', $addressOriginal);
		$addressTrimmed = str_replace(',+,+', ',+', $addressWhiteSpaceRemoved);
		$addressCleaned = str_replace("'", '', $addressTrimmed);
		$url = "http://maps.googleapis.com/maps/api/staticmap?center=$addressCleaned&zoom=13&size=600x300&maptype=roadmap&markers=$addressCleaned&sensor=false";

		return array(
			'url'					=>	$url,
			'venueModel'			=>	$venueModel
		);
	}

	public function approveAction() {
		$venueModel = $this->getVenueModel();
		if (!$venueModel) { $this->nwFlashMessenger()->addErrorMessage("We cannot locate your venue for approval. Please fill out your venue information again."); return $this->redirect()->toRoute('venues/add'); }

		$memberModel = $this->getLoggedInMember();
		$venueModel->status = EventVenueStatusConstants::PENDING_APPROVAL;
		if (isset($memberModel) && isset($venueModel->id)) {
			$this->checkMemberAgainstVenueModel($memberModel, $venueModel);
			$processResult = $this->getVenuesProcess()->updateModel($venueModel);
			if ($processResult->success) {
				$this->nwFlashMessenger()->addSuccessMessage("You have updated the venue: {$venueModel->name}.");
				$this->getVenuesProcess()->sendApprovalEmailToAdmin($venueModel);
			}
			else $this->nwFlashMessenger()->addErrorMessage($processResult->message);
		} else {
			$processResult = $this->getVenuesProcess()->insertModel($venueModel);
			if ($processResult->success) {
				$this->nwFlashMessenger()->addSuccessMessage("You have successfully added a venue to our site!");
				$this->getSessionVenuesMapper()->delete();
				$this->getVenuesProcess()->sendApprovalEmailToAdmin($venueModel);
			}
			else $this->nwFlashMessenger()->addErrorMessage($processResult->message);
		}

		return $this->redirect()->toRoute('home');
	}


	// =================================================================== HELPER METHODS ============================================================================
	/**
	 * @return \Venues\Model\VenueModel
	 */
	private function getVenueModel() {
		$params = $this->params('venueId');
		$memberModel = $this->getLoggedInMember();

		if (isset($params)) {
			$venueModel = $this->getVenuesMapper()->fetchOneForId($this->params('venueId'));  /*@var $eventModel \Venues\Model\SessionVenueModel */
		} else $venueModel = $this->getSessionVenuesMapper()->fetchModel();

		if (isset($venueModel->member_id) && isset($memberModel)) $this->checkMemberAgainstVenueModel($memberModel, $venueModel);

		return $venueModel;
	}

	/**
	 * @param \Registration\Model\MemberModel $memberModel
	 * @param \Venues\Model\VenueModel $venueModel
	 */
	private function checkMemberAgainstVenueModel($memberModel, $venueModel) {
		if ($memberModel->role == 'admin') return;
		if ($memberModel->id != $venueModel->member_id) $this->throwExceptionForVenue($venueModel);
	}

	/**
	 * @param \Venues\Model\VenueModel $venueModel
	 */
	private function throwExceptionForVenue($venueModel) {
		throw new \Exception("You are not authorized to access event: {$venueModel->id}. Please make sure you are logged in.");
	}


	// =================================================================== FACTORY METHODS ============================================================================
	/**
	 * @return \Venues\Mapper\VenuesMapper
	 */
	private function getVenuesMapper() {
		if (!isset($this->_venuesMapper)) $this->_venuesMapper = $this->getServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_venuesMapper;
	}

	/**
	 * @return \Venues\Mapper\SessionVenuesMapper
	 */
	private function getSessionVenuesMapper() {
		if (!isset($this->sessionVenuesMapper)) $this->sessionVenuesMapper = $this->getServiceLocator()->get('\Venues\Mapper\SessionVenuesMapper');
		return $this->sessionVenuesMapper;
	}

	/**
	 * @return \Venues\Process\VenuesProcess
	 */
	private function getVenuesProcess() {
		if (!isset($this->_venuesProcess)) $this->_venuesProcess = $this->getServiceLocator()->get('\Venues\Process\VenuesProcess');
		return $this->_venuesProcess;
	}
}