<?php
namespace RegistrationTest\Controller;

use Application\Constants\MessageConstants as ApplicationMessageConstants;
use Application\Constants\EventVenueStatusConstants;
//use Registration\Constants\EmailConstants;
//use Registration\Constants\MessageConstants as RegistrationMessageConstants;
//use Registration\Constants\StatusConstants;
//use NovumWare\Helpers\NovumWareHelpers;

class RegistrationControllerTest extends \NovumWare\Test\Controller\AbstractControllerTest
{

	public function testDetermineUserStatusAction() {
		$this->dispatch('/determine-user-status/event');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('determine-user-status');
		$this->assertModuleName('Registration');
		$this->assertControllerClass('RegistrationController');
		$this->assertActionName('determine-user-status');

		$resultVariablesParams = $this->getResultVariables('params');
		$resultVariablesRegister = $this->getResultVariables('register');
		$resultVariablesRemainUnregistered = $this->getResultVariables('remainUnregistered');
		$this->assertEquals('event', $resultVariablesParams);
		$this->assertEquals(EventVenueStatusConstants::REGISTERED, $resultVariablesRegister);
		$this->assertEquals(EventVenueStatusConstants::REMAIN_UNREGISTERED, $resultVariablesRemainUnregistered);
	}

	public function testDetermineUserStatusActionPostValidChooseToRegisterForEvent() {
		$dataPost = array(
			'determineRegistrationStatusForm' => array(
				'status'	=> EventVenueStatusConstants::REGISTERED
			)
		);
		$eventModel = $this->getMockSessionEventsMapper()->createModelFromData();
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($eventModel)->once();
		$eventModel->setProperties($dataPost['determineRegistrationStatusForm']);
		$this->getMockSessionEventsMapper()->shouldReceive('saveModel')->with($eventModel)->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with('Thank you for choosing to register with us. Please fill out the registration info below.')->andReturnNull()->once();

		$this->dispatch('/determine-user-status/event', 'POST', $dataPost);
		$this->assertRedirectTo('/register');
		$this->assertResponseStatusCode(302);
	}

	public function testDetermineUserStatusActionPostValidChooseToRegisterForVenue() {
		$dataPost = array(
			'determineRegistrationStatusForm' => array(
				'status'	=> EventVenueStatusConstants::REGISTERED
			)
		);
		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData();
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();
		$venueModel->setProperties($dataPost['determineRegistrationStatusForm']);
		$this->getMockSessionVenuesMapper()->shouldReceive('saveModel')->with($venueModel)->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with('Thank you for choosing to register with us. Please fill out the registration info below.')->andReturnNull()->once();

		$this->dispatch('/determine-user-status/venue', 'POST', $dataPost);
		$this->assertRedirectTo('/register');
		$this->assertResponseStatusCode(302);
	}

	public function testDetermineUserStatusActionPostValidChooseToRemainUnregisteredForEvent() {
		$dataPost = array(
			'determineRegistrationStatusForm' => array(
				'status'	=> EventVenueStatusConstants::REMAIN_UNREGISTERED
			)
		);
		$eventModel = $this->getMockSessionEventsMapper()->createModelFromData();
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($eventModel)->once();
		$eventModel->setProperties($dataPost['determineRegistrationStatusForm']);
		$this->getMockSessionEventsMapper()->shouldReceive('saveModel')->with($eventModel)->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with('You have chosen to remain unregistered. Please fill out the event info below.')->andReturnNull()->once();

		$this->dispatch('/determine-user-status/event', 'POST', $dataPost);
		$this->assertRedirectTo('/add-event');
		$this->assertResponseStatusCode(302);
	}

	public function testDetermineUserStatusActionPostValidChooseToRemainUnregisteredForVenue() {
		$dataPost = array(
			'determineRegistrationStatusForm' => array(
				'status'	=> EventVenueStatusConstants::REMAIN_UNREGISTERED
			)
		);
		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData();
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();
		$venueModel->setProperties($dataPost['determineRegistrationStatusForm']);
		$this->getMockSessionVenuesMapper()->shouldReceive('saveModel')->with($venueModel)->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with('You have chosen to remain unregistered. Please fill out the venue info below.')->andReturnNull()->once();

		$this->dispatch('/determine-user-status/venue', 'POST', $dataPost);
		$this->assertRedirectTo('/venues/add');
		$this->assertResponseStatusCode(302);
	}

	public function testDetermineUserStatusActionPostInvalid() {
		$dataPost = array(
			'determineRegistrationStatusForm' => array(
				'status'	=> ''
			)
		);
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(ApplicationMessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/determine-user-status/venue', 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}


	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Mockery\Mock|\NovumWare\Test\Process\MockProcess
	 */
//	protected function getMockMembersMapper() {
//		if (!isset($this->_membersMapper)) $this->_membersMapper = $this->getApplicationServiceLocator()->get('\Registration\Mapper\MembersMapper');
//		return $this->_membersMapper;
//	}

	/**
	 * @return \Mockery\Mock|\NovumWare\Test\Process\MockProcess
	 */
	protected function getMockRegistrationProcess() {
		if (!isset($this->_registrationProcess)) $this->_registrationProcess = $this->getApplicationServiceLocator()->get('\Registration\Process\RegistrationProcess');
		return $this->_registrationProcess;
	}

	/**
	 * @return \Mockery\Mock|\Events\Mapper\SessionEventsMapper
	 */
	private function getMockSessionEventsMapper() {
		if (!isset($this->_mockSessionEventsMapper)) $this->_mockSessionEventsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\SessionEventsMapper');
		return $this->_mockSessionEventsMapper;
	}

	/**
	* @return \Mockery\Mock|\Venues\Mapper\SessionVenuesMapper
	*/
	private function getMockSessionVenuesMapper() {
		if (!isset($this->_mockSessionVenuesMapper)) $this->_mockSessionVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\SessionVenuesMapper');
		return $this->_mockSessionVenuesMapper;
	}
}