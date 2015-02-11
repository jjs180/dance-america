<?php
namespace Authentication\Controller;

use Acl\Constants\AclMessageConstants;
use Application\Constants\MessageConstants;
use Authentication\Form\LoginForm;
use Authentication\Form\ResetPasswordForm;
use Authentication\Form\ForgotPasswordForm;
use NovumWare\Helpers\NovumWareHelpers;

class AuthenticationController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{

	// ========================================================================= ACTIONS =========================================================================
	public function loginAction() {
		if (!$this->getRequest()->isPost()) return;

		$loginForm = new LoginForm($this->getRequest()->getPost('loginForm'));
		if (!$loginForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return; }
		$loginFormData = $loginForm->getData();

		$authAdapter = $this->getAuthAdapter();
		$authAdapter->setIdentity($loginFormData['email'])
					->setCredential(NovumWareHelpers::encryptPassword($loginFormData['password']));
		$authenticationResult = $authAdapter->authenticate();
		if (!$authenticationResult->isValid()) { $this->nwFlashMessenger()->addErrorMessage('Invalid email / password combination'); return; }


		$memberDataPrefixed = $authAdapter->getResultRowObject();
		$membersMapper = $this->getMembersMapper();
		$memberData = $membersMapper->unprefixDataArray($memberDataPrefixed);

		$memberModel = $membersMapper->createModelFromData($memberData); /*@var $memberModel \Registration\Model\MemberModel */

		$this->getAuthSession()->write($memberModel->toArray());

		$this->nwFlashMessenger()->addSuccessMessage('You have successfully logged in');
		if ($memberModel->role == 'admin') return $this->redirect()->toRoute('admin');

		$returnUrl = $this->getReturnUrl();

		if ($returnUrl) return $this->redirect()->toUrl($returnUrl);
		else return $this->redirect()->toRoute('account');
	}

	public function logoutAction() {
		$this->logout();
		$this->nwFlashMessenger()->addSuccessMessage('You have successfully logged out');
		return $this->redirect()->toRoute('home');
	}

	public function accessDeniedAction() {
		$deniedUrl = $this->getRequest()->getQuery('deniedUrl');

		$this->nwFlashMessenger()->addErrorMessage(AclMessageConstants::ACCESS_DENIED);
		if ($deniedUrl) return $this->redirect()->toUrl($this->getServiceLocator()->get('router')->assemble(array(), array('name'=>'login')).'/returnUrl'.$deniedUrl);
		else return $this->redirect()->toRoute('login');
	}

	public function forgotPasswordAction() {
		if (!$this->getRequest()->isPost()) {
			if (!$this->getLoggedInMember()) return;
			else $forgotPasswordFormData = ['email'=>$this->getLoggedInMember()->email];
		} else $forgotPasswordFormData = $this->getRequest()->getPost('forgotPasswordForm');

		$forgotPasswordForm = new ForgotPasswordForm($forgotPasswordFormData);
		if (!$forgotPasswordForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return; }
		$formData = $forgotPasswordForm->getData();

		$processResult = $this->getForgotPasswordProcess()->createPasswordVerification($formData['email']);
		if (!$processResult->success) { $this->nwFlashMessenger()->addErrorMessage($processResult->message); return; }

		return $this->redirect()->toRoute('password/forgot/thanks');
	}

	public function forgotPasswordThanksAction() {}

	public function resetPasswordAction() {
		if (!$this->getRequest()->isPost()) return array(
			'email'		  => $this->params('email'),
			'securityKey' => $this->params('securityKey')
		);

		$formResetPasswordPost = $this->getRequest()->getPost('resetPasswordForm');
		$viewParams = array(
			'email'		  => $formResetPasswordPost['email'],
			'securityKey' => $formResetPasswordPost['security_key']
		);
		$resetPasswordForm = new ResetPasswordForm($formResetPasswordPost);
		if (!$resetPasswordForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $viewParams; }
		$formData = $resetPasswordForm->getData();

		$processResult = $this->getForgotPasswordProcess()->resetPassword($formData['email'], $formData['security_key'], $formData['password']);
		if (!$processResult->success) { $this->nwFlashMessenger()->addErrorMessage($processResult->message); return $viewParams; }

		$this->nwFlashMessenger()->addSuccessMessage('Your password has been changed, please login!');

		return $this->redirect()->toRoute('login');
	}

	// ========================================================================= PROTECTED METHODS =========================================================================
	/**
	 * @return void
	 */
	protected function logout() {
		$this->getAuthSession()->clear();
	}

	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Zend\Authentication\Adapter\AbstractAdapter
	 */
	protected function getAuthAdapter() {
		if (!isset($this->authAdapter)) $this->authAdapter = $this->getServiceLocator()->get('Authentication\AuthAdapter');
		return $this->authAdapter;
	}

	/**
	 * @return \Authentication\Process\ForgotPasswordProcess
	 */
	protected function getForgotPasswordProcess() {
		if (!isset($this->forgotPasswordProcess)) $this->forgotPasswordProcess = $this->getServiceLocator()->get('Authentication\Process\ForgotPasswordProcess');
		return $this->forgotPasswordProcess;
	}
}
