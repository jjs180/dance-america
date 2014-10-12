<?php
namespace Registration\Controller;

use Application\Constants\MessageConstants as ApplicationMessageConstants;
use Registration\Constants\MessageConstants;
use Registration\Form\MemberRegistrationForm;
use Registration\Form\RegistrationStatusForm;
use Application\Constants\EventVenueStatusConstants;

class RegistrationController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	// ========================================================================= ACTIONS =========================================================================
	public function determineUserStatusAction() {
		$params = $this->params('type');

		$memberModel = $this->getLoggedInMember();
		if (isset($memberModel) && $params == 'event') {
			$eventModel = $this->getSessionEventsMapper()->fetchModel(); /*@ver $eventModel \Events\Model\EventsModel */
			$eventModel->status = EventVenueStatusConstants::REGISTERED;
			$eventModel->member_id = $memberModel->id;
			$this->getSessionEventsMapper()->saveModel($eventModel);
			$this->getRedirectToPreviousPage();
		} elseif (isset($memberModel) && $params == 'venue') {
			$venueModel = $this->getSessionVenuesMapper()->fetchModel(); /*@var $venueModel \Venues\Model\VenueModel */
			$venueModel->status = EventVenueStatusConstants::REGISTERED;
			$venueModel->member_id = $memberModel->id;
			$this->getSessionVenuesMapper()->saveModel($venueModel);
			$this->getRedirectToPreviousPage();
		}

		$this->setReturnParams(array(
			'params'				=>	$params,
			'register'				=>	EventVenueStatusConstants::REGISTERED,
			'remainUnregistered'	=>	EventVenueStatusConstants::REMAIN_UNREGISTERED
		));

		if (!$this->getRequest()->isPost()) return $this->getReturnParams();

		$registrationStatusForm = new RegistrationStatusForm($this->getRequest()->getPost('determineRegistrationStatusForm'));
		if (!$registrationStatusForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(ApplicationMessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }

		$registrationStatusFormData = $registrationStatusForm->getData();
		if ($params == 'event') {
			$eventModel = $this->getSessionEventsMapper()->fetchModel();
			$eventModel->status = $registrationStatusFormData['status'];
			$this->getSessionEventsMapper()->saveModel($eventModel);
		} else {
			$venueModel = $this->getSessionVenuesMapper()->fetchModel();
			$venueModel->status = $registrationStatusFormData['status'];
			$this->getSessionVenuesMapper()->saveModel($venueModel);
		}

		if ($registrationStatusFormData['status'] == EventVenueStatusConstants::REGISTERED) {
			$this->nwFlashMessenger()->addSuccessMessage('Thank you for choosing to register with us. Please fill out the registration info below.');
			return $this->redirect()->toRoute('register');
		} elseif ($registrationStatusFormData['status'] == EventVenueStatusConstants::REMAIN_UNREGISTERED && $params == 'event') {
			$this->nwFlashMessenger()->addSuccessMessage('You have chosen to remain unregistered. Please fill out the event info below.');
			return $this->redirect()->toRoute('events/add');
		} else {
			$this->nwFlashMessenger()->addSuccessMessage('You have chosen to remain unregistered. Please fill out the venue info below.');
			return $this->redirect()->toRoute('venues/add');
		}
	}

	public function registerAction() {
		if (!$this->getRequest()->isPost()) return;

		$registrationForm = new MemberRegistrationForm($this->getRequest()->getPost('registrationForm'));
		if (!$registrationForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(ApplicationMessageConstants::ERROR_INVALID_FORM); return; }

		$membersMapper = $this->getMembersMapper();
		$memberModel = $membersMapper->createModelFromData($registrationForm->getData()); /* @var $memberModel \Registration\Model\MemberModel */

		$registrationProcessResult = $this->getRegistrationProcess()->registerNewMember($memberModel);
		if (!$registrationProcessResult->success) { $this->nwFlashMessenger()->addErrorMessage($registrationProcessResult->message); return; }

		return $this->redirect()->toRoute('register/thanks', ['email'=>$memberModel->email]);
	}

	public function checkEmailAvailableAction() {
		if (!$this->getRequest()->isPost()) return;

		$registrationForm = $this->getRequest()->getPost('registrationForm');

		$membersMapper = $this->getMembersMapper();
		$existingMember = $membersMapper->fetchOneForEmail($registrationForm['email']);

		return array(
			'available'	=> !isset($existingMember),
		);
	}

	public function termsAction() {}

	public function thanksAction() {
		$email = $this->params('email');

		return array(
			'email'	=> $email
		);
	}

	public function verifyEmailResendAction() {
		$email = $this->params('email');

		$processResult = $this->getRegistrationProcess()->resendEmailVerificationEmail($email);
		if (!$processResult->success) { $this->nwFlashMessenger()->addErrorMessage($processResult->message); return $this->redirect()->toRoute('home'); }
		$this->nwFlashMessenger()->addSuccessMessage('Your verification email has been re-sent!');

		return $this->redirect()->toRoute('register/thanks', ['email'=>$email]);
	}

	public function verifyEmailAction() {
		$email = $this->params('email');
		$securityKey = $this->params('securityKey');
		if (!$email || !$securityKey) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_COULD_NOT_VERIFY_EMAIL); return $this->redirect()->toRoute('authentication', ['action'=>'login']); }
		$verifyEmailProcessResult = $this->getRegistrationProcess()->verifyEmail($email, $securityKey);
		if (!$verifyEmailProcessResult->success) { $this->nwFlashMessenger()->addErrorMessage($verifyEmailProcessResult->message); return $this->redirect()->toRoute('authentication', ['action'=>'login']); }

		$this->nwFlashMessenger()->addSuccessMessage('Your email has been verified, please login!');

		return $this->redirect()->toRoute('login');
	}

	public function membersAction() {
		return array(
			'members' => $this->getMembersMapper()->fetchAll()
		);
	}

	public function deleteMemberAction() {
		$redirect = $this->redirect()->toRoute('registration', array('action'=>'members'));

		$id = $this->params('id');
		if (!$id) { $this->nwFlashMessenger()->addErrorMessage(ApplicationMessageConstants::ERROR_MISSING_INFO); return $redirect; }

		$membersMapper = $this->getMembersMapper();
		$memberModel = $membersMapper->fetchOneForId($id);
		if (!$memberModel) { $this->nwFlashMessenger()->addErrorMessage('Could not find the member to delete'); return $redirect; }

		$membersMapper->deleteModel($memberModel);
		$this->nwFlashMessenger()->addSuccessMessage('Member has been deleted');

		return $redirect;
	}


	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Registration\Process\RegistrationProcess
	 */
	protected function getRegistrationProcess() {
		if (!isset($this->registrationProcess)) $this->registrationProcess = $this->getServiceLocator()->get('Registration\Process\RegistrationProcess');
		return $this->registrationProcess;
	}

	/**
	 * @return \Events\Mapper\SessionEventsMapper
	 */
	private function getSessionEventsMapper() {
		if (!isset($this->_sessionEventsMapper)) $this->_sessionEventsMapper = $this->getServiceLocator()->get('\Events\Mapper\SessionEventsMapper');
		return $this->_sessionEventsMapper;
	}

	/**
	 * @return \Venues\Mapper\SessionVenuesMapper
	 */
	private function getSessionVenuesMapper() {
		if (!isset($this->_sessionVenuesMapper)) $this->_sessionVenuesMapper = $this->getServiceLocator()->get('\Venues\Mapper\SessionVenuesMapper');
		return $this->_sessionVenuesMapper;
	}

}