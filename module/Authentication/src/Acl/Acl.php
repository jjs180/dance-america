<?php
namespace Acl;

use Acl\Constants\RoleConstants;

class Acl extends \NovumWare\Zend\Permissions\Acl\Acl
{
	protected function defineRoles() {
		$this->addRole(RoleConstants::GUEST);
		$this->addRole(RoleConstants::MEMBER, RoleConstants::GUEST);
		$this->addRole(RoleConstants::ADMIN, RoleConstants::MEMBER);
	}

	protected function defineResources() {
		$this->addResource('account');
		$this->addResource('my-events', 'account');
		$this->addResource('my-venues', 'account');
		$this->addResource('my-people', 'account');

		$this->addResource('authentication');
		$this->addResource('access-denied', 'authentication');
		$this->addResource('login', 'authentication');
		$this->addResource('logout', 'authentication');
		$this->addResource('password', 'authentication');


		$this->addResource('registration');
		$this->addResource('terms', 'registration');
		$this->addResource('determine-user-status', 'registration');
		$this->addResource('register', 'registration');

		$this->addResource('pages');
		$this->addResource('home', 'pages');
		$this->addResource('about', 'pages');
		$this->addResource('contact', 'pages');

		$this->addResource('venues');

		$this->addResource('events');
		$this->addResource('people');
		
		$this->addResource('admin');
		$this->addResource('manage-people');
		$this->addResource('manage-venues');
		$this->addResource('manage-events');
	}

	protected function definePermissions() {
		$this->allow(RoleConstants::GUEST, 'authentication');
		$this->allow(RoleConstants::GUEST, 'pages');
		$this->allow(RoleConstants::GUEST, 'events');
		$this->allow(RoleConstants::GUEST, 'venues');
		$this->allow(RoleConstants::GUEST, 'people');
		$this->allow(RoleConstants::GUEST, 'registration');

		$this->allow(RoleConstants::MEMBER, 'account');

		$this->allow(RoleConstants::ADMIN);
		$this->allow(RoleConstants::ADMIN, 'account');
		
	}
}