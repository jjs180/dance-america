<?php
namespace AdminTest\Controller;

use \Application\Constants\EventVenueStatusConstants;

class AdminControllerTest extends \NovumWare\Test\Controller\AbstractControllerTest
{
	public function testAdminAction() {
		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/admin');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('admin');
		$this->assertModuleName('Admin');
		$this->assertControllerClass('AdminController');
		$this->assertActionName('admin');
	}

	public function testManageVenuesAction() {
		$data = array(
			'id'	=>	'26',
			'name'	=>	'Sonny\'s bar and grill'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$this->getMockVenuesMapper()->shouldReceive('fetchAll')->withNoArgs()->andReturn([$venueModel, $venueModel, $venueModel])->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-venues');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('manage-venues');
		$this->assertModuleName('Admin');
		$this->assertControllerClass('AdminController');
		$this->assertActionName('manage-venues');

		$this->getResultVariables('venueModelsArray');
	}

	public function testManageVenuesActionNoneFound() {
		$this->getMockVenuesMapper()->shouldReceive('fetchAll')->withNoArgs()->andReturn([])->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-venues');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);

		$this->getResultVariables('venueModelsArray');
	}

	public function testManageEventsAction() {
		$data = array(
			'id'		=>	'26',
			'name'		=>	'Sonny\'s bar and grill',
			'venue_id'	=>	'23'

		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($data);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData(['id' => $data['venue_id']]);
		$this->getMockEventsMapper()->shouldReceive('fetchAll')->withNoArgs()->andReturn([$eventModel, $eventModel, $eventModel])->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['venue_id'])->andReturn($venueModel)->times(1);

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-events');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('manage-events');
		$this->assertModuleName('Admin');
		$this->assertControllerClass('AdminController');
		$this->assertActionName('manage-events');

		$this->getResultVariables('eventModelsArray');
	}

	public function testManageEventsActionNoneFound() {
		$this->getMockEventsMapper()->shouldReceive('fetchAll')->withNoArgs()->andReturn([])->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-events');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);

		$this->getResultVariables('eventModelsArray');
	}


	public function testApproveEventAction() {
		$data = array(
			'id'	=>	'35',
			'name'	=>	'Wed night swingers'
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($data);
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($eventModel)->once();

		$eventModel->status = EventVenueStatusConstants::APPROVED;
		$this->getMockEventsMapper()->shouldReceive('updateModel')->with($this->compareModel($eventModel))->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("You have approved a new event")->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch("/manage-events/approve/35");
		$this->assertRedirectTo('/manage-events');
		$this->assertResponseStatusCode(302);
	}

	public function testApproveEventActionNoEventFound() {
		$data = array(
			'id'	=>	'35',
			'name'	=>	'Wed night swingers'
		);
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->setExpectedException('\Exception', "Event: {$data['id']} cannot be found");

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch("/manage-events/approve/35");
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testApproveVenueAction() {
		$data = array(
			'id'	=>	'35',
			'name'	=>	'Wed night swingers'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($venueModel)->once();

		$venueModel->status = EventVenueStatusConstants::APPROVED;
		$this->getMockVenuesMapper()->shouldReceive('updateModel')->with($this->compareModel($venueModel))->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("You have approved a new venue")->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch("/manage-venues/approve/35");
		$this->assertRedirectTo('/manage-venues');
		$this->assertResponseStatusCode(302);
	}

	public function testApproveVenueActionNoVenueFound() {
		$data = array(
			'id'	=>	'35',
			'name'	=>	'Wed night swingers'
		);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->setExpectedException('\Exception', "Venue: {$data['id']} cannot be found");

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch("/manage-venues/approve/35");
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testRejectEventAction() {
		$data = array(
			'id'	=>	'35',
			'name'	=>	'Wed night swingers'
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($data);
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($eventModel)->once();

		$this->getMockEventsMapper()->shouldReceive('deleteModel')->with($this->compareModel($eventModel))->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addMessage')->with("The event: {$eventModel->id} has been rejected")->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch("/manage-events/reject/35");
		$this->assertRedirectTo('/manage-events');
		$this->assertResponseStatusCode(302);
	}

	public function testRejectEventActionNoEventFound() {
		$data = array(
			'id'	=>	'35',
			'name'	=>	'Wed night swingers'
		);
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->setExpectedException('\Exception', "Event: {$data['id']} cannot be found");

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch("/manage-events/reject/35");
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testRejectVenueAction() {
		$data = array(
			'id'	=>	'35',
			'name'	=>	'Wed night swingers'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($venueModel)->once();

		$this->getMockVenuesMapper()->shouldReceive('deleteModel')->with($this->compareModel($venueModel))->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addMessage')->with("The venue: {$venueModel->id} has been rejected")->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch("/manage-venues/reject/35");
		$this->assertRedirectTo('/manage-venues');
		$this->assertResponseStatusCode(302);
	}

	public function testRejectVenueActionNoVenueFound() {
		$data = array(
			'id'	=>	'35',
			'name'	=>	'Wed night swingers'
		);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->setExpectedException('\Exception', "Venue: {$data['id']} cannot be found");

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch("/manage-venues/reject/35");
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}


	// ================================================================= FACTORY METHODS============================================================
	/**
	 * @return \Mockery\Mock|\Venues\Mapper\VenuesMapper
	 */
	private function getMockVenuesMapper() {
		if (!isset($this->_mockVenuesMapper)) $this->_mockVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_mockVenuesMapper;
	}

	/**
	 * @return \Mockery\Mock|\Events\Mapper\EventsMapper
	 */
	private function getMockEventsMapper() {
		if (!isset($this->_mockEventsMapper)) $this->_mockEventsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\EventsMapper');
		return $this->_mockEventsMapper;
	}
}