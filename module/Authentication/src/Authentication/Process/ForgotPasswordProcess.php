<?php
namespace Authentication\Process;

use Authentication\Constants\EmailConstants;
use NovumWare\Helpers\NovumWareHelpers;
use NovumWare\Process\ProcessException;

/**
 * @method \NovumWare\Process\ProcessResult createPasswordVerification(string $email)
 * @method \NovumWare\Process\ProcessResult resetPassword(string $email, string $securityKey, string $newPassword)
 */
class ForgotPasswordProcess extends \NovumWare\Process\AbstractProcess
{
	/**
	 * @param string $email
	 * @return \NovumWare\Process\ProcessResult
	 */
	protected function _createPasswordVerification($email) {
		$memberModel = $this->getMembersMapper()->fetchOneForEmail($email);
		if (!$memberModel) throw new ProcessException('Could not find that email address');

		$passwordResetModel = $this->getMemberPasswordResetsMapper()->createModelFromData();
		$passwordResetModel->email = $email;
		$passwordResetModel->security_key = NovumWareHelpers::generateKey(32);
		$this->getMemberPasswordResetsMapper()->insertModel($passwordResetModel);

		$resetLink = $this->urlCanonical('password/reset', array(
				'email'			=> $passwordResetModel->email,
				'securityKey'	=> $passwordResetModel->security_key
			));

		$this->getEmailsProcess()->sendEmailFromTemplate($email, EmailConstants::PASSWORD_RESET_SUBJECT, EmailConstants::PASSWORD_RESET_TEMPLATE, array('resetLink'=>$resetLink));
	}

	/**
	 * @param string $email
	 * @param string $securityKey
	 * @param string $newPassword
	 * @return \NovumWare\Process\ProcessResult
	 */
	protected function _resetPassword($email, $securityKey, $newPassword) {
		$passwordResetsMapper = $this->getMemberPasswordResetsMapper();
		$passwordResetModel = $passwordResetsMapper->fetchOneForEmailAndSecurityKey($email, $securityKey);
		if (!$passwordResetModel) throw new ProcessException('Could not verify your email address, please return to the email and click the link again');

		$membersMapper = $this->getMembersMapper();
		$memberModel = $membersMapper->fetchOneForEmail($email);
		if (!$memberModel) throw new \Exception("Could not find member with email: $email");

		$memberModel->password = NovumWareHelpers::encryptPassword($newPassword);
		$membersMapper->updateModel($memberModel);

		$passwordResetsMapper->deleteModel($passwordResetModel);
	}


	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Registration\Mapper\MembersMapper
	 */
	protected function getMembersMapper() {
		if (!isset($this->membersMapper)) $this->membersMapper = $this->serviceManager->get('Registration\Mapper\MembersMapper');
		return $this->membersMapper;
	}

	/**
	 * @return \Authentication\Mapper\MemberPasswordResetsMapper
	 */
	protected function getMemberPasswordResetsMapper() {
		if (!isset($this->memberPasswordResetsMapper)) $this->memberPasswordResetsMapper = $this->serviceManager->get('Authentication\Mapper\MemberPasswordResetsMapper');
		return $this->memberPasswordResetsMapper;
	}

	/**
	 * @return \NovumWare\Process\EmailsProcess
	 */
	protected function getEmailsProcess() {
		if (!isset($this->emailsProcess)) $this->emailsProcess = $this->serviceManager->get('NovumWare\Process\EmailsProcess');
		return $this->emailsProcess;
	}
}
