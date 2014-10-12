<?php
namespace Registration\Model;

use Acl\Constants\RoleConstants;
use Registration\Constants\StatusConstants;

class MemberModel extends \NovumWare\Model\AbstractModel
{
	public $id;
	public $email;
	public $password;
	public $status = StatusConstants::MEMBER_PENDING_EMAIL_VERIFICATION;
	public $role = RoleConstants::MEMBER;
	public $read_terms = false;
	public $last_login;
	public $time_created;
	public $time_updated;

	// ========================================================================= GET / SET =========================================================================
}