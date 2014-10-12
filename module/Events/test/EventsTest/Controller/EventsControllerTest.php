<?php
namespace EventsTest\Controller;

use Application\Constants\MessageConstants;

class EventsControllerTest extends \NovumWare\Test\Controller\AbstractControllerTest
{
	public function testAddEventAction() {
		$dataEvent = array(
			'name'	=>	'Wed night swing'
		);

		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($eventModel)->once();

		$this->dispatch('/events/add');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$eventModelResultVariables = $this->getResultVariables('eventModel');
		$this->assertEquals($eventModel, $eventModelResultVariables);
	}

	public function testAddEventActionFormValid() {
		$eventModel = $this->getMockEventsMapper()->createModelFromData();
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($eventModel)->once();
		$dataPost = array(
			'addEventForm'	=>	array(
				'minimum_age'		=>	'18 and older',
				'start_time'		=>	'01%3A00',
				'end_time'			=>	'13%3A00',
				'start_date'		=>	'2014-01-01',
				'end_date'			=>	'2014-01-01',
				'monthly_frequency'	=>	'Yearly',
				'venue_id'			=>	'45',
				'will_stop'			=>	true
			)
		);
		$newEventModel = $eventModel->setProperties($dataPost['addEventForm']);
		$processResultSuccess = $this->getProcessResultSuccess($newEventModel);
		$this->getMockEventsProcess()->shouldReceive('saveModel')->with($eventModel)->andReturn($processResultSuccess)->once();

		$this->dispatch('/events/add', 'POST', $dataPost);
		$this->assertResponseStatusCode(302);
		$this->assertRedirectTo('/events/review');
	}

	public function testAddEventActionFormInvalid() {
		$dataPost = array(
			'addEventForm'	=>	array(
				'name'				=>	'Westie Wednesdays',
				'monthly_frequency'	=>	'Yearly',
			)
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataPost['addEventForm']);
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->andReturn($eventModel)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/events/add', 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testEditEventActionUsingSession() {
		$dataEvent = array(
			'name'				=>	'Westie Wednesdays',
			'monthly_frequency'	=>	'Yearly',
			'venue_id'			=>	'45'
		);
		$dataVenue = array(
			'id'		=>	$dataEvent['venue_id'],
			'name'		=>	'Higgley piggley',
		);
		$expectedEventModel = $this->getMockSessionEventsMapper()->createModelFromData($dataEvent);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($expectedEventModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataEvent['venue_id'])->andReturn($venueModel)->once();
		$this->dispatch('/events/edit');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('events/edit');
		$this->assertModuleName('Events');
		$this->assertControllerClass('EventsController');
		$this->assertActionName('edit');
		$eventModelResultVariables = $this->getResultVariables('eventModel');
		$this->assertEquals($expectedEventModel, $eventModelResultVariables);
	}

	public function testEditEventActionNoEventFoundInGetRequest() {
		$dataEvent = array(
			'id'		=>	'42',
			'member_id'	=>	'433'
		);
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your event cannot be located for editting. Please fill out your event information again.')->andReturnNull()->once();

		$this->dispatch('/events/edit/'.$dataEvent['id']);
		$this->assertRedirectTo('/events/add');
		$this->assertResponseStatusCode(302);
	}

	public function testEditEventActionWithGetRequest() {
		$dataRepetition = array(
			'id'					=>	'45',
			'repetition_parameter'	=>	'weeks',
			'event_id'				=>	'42',
			'day_of_week'			=>	'Tuesday',
			'day_of_month'			=>	'3',
			'month_of_year'			=>	''
		);
		$dataCost = array(
			'id'		=>	'23',
			'event_id'	=>	'42'
		);
		$repetitionModel = $this->getMockRepetitionsMapper()->createModelFromData($dataRepetition);
		$costModel = $this->getMockCostsMapper()->createModelFromData($dataCost);

		$dataEvent = array(
			'id'			=>	'42',
			'member_id'		=>	'433',
			'costs'			=>	[$costModel, $costModel, $costModel],
			'repetitions'	=>	[$repetitionModel, $repetitionModel]
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);

		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($eventModel)->once();
		$this->getMockRepetitionsMapper()->shouldReceive('fetchManyForEventId')->with($dataEvent['id'])->andReturn([$repetitionModel, $repetitionModel])->twice();
		$this->getMockCostsMapper()->shouldReceive('fetchManyForEventId')->with($dataEvent['id'])->andReturn([$costModel, $costModel, $costModel])->times(3);

		$this->dispatch('/events/edit/'.$dataEvent['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$eventModelResultVariables = $this->getResultVariables('eventModel');

		$this->assertEquals($eventModel, $eventModelResultVariables);
	}

	public function testEditEventActionUsingGetRequestNotAuthorized() {
		$dataMember = array(
			'id'	=>	'10',
			'name'	=>	'Cara'
		);
		$dataVenue = array(
			'id'	=>	'42',
			'name'	=>	'example shack'
		);
		$dataEvent = array(
			'id'			=>	'24',
			'name'			=>	'Westie Wednesdays',
			'address_1'		=>	'880 N sdflkjsd',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA',
			'type'			=>	'Bar',
			'minimum_age'	=>	'None',
			'member_id'		=>	$dataMember['id'],
			'venue_id'		=>	$dataVenue['id']
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$this->setLoggedInUserWithRole();
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($eventModel)->once();
		$this->setExpectedException('\Exception', "You are not authorized to access event: {$eventModel->id}. Please make sure you are logged in.");

		$this->dispatch('/events/edit/'.$dataEvent['id']);
		$this->assertRedirectTo('/account');
		$this->assertResponseStatusCode(302);
	}

	public function testEditEventActionNoEventFoundInSession() {
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your event cannot be located for editting. Please fill out your event information again.')->andReturnNull()->once();

		$this->dispatch('/events/edit');
		$this->assertRedirectTo('/events/add');
		$this->assertResponseStatusCode(302);
	}

	public function testEditEventActionFormValidInSession() {
		$data = array(
			'name'		=>	'Swing With Me',
			'venue_id'	=>	'94'
		);
		$dataPost = array(
			'editEventForm'	=>	array(
				'minimum_age'		=>	'18 and older',
				'start_time'		=>	'01%3A00',
				'end_time'			=>	'13%3A00',
				'start_date'		=>	'2014-01-01',
				'end_date'			=>	'2014-01-01',
				'monthly_frequency'	=>	'Yearly',
				'contact_email'		=>	'example@gmail.com',
				'venue_id'			=>	'28',
				'will_stop'			=>	true
			)
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($data);

		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($eventModel)->once();
		$eventModel->setProperties($dataPost['editEventForm']);
		$this->getMockSessionEventsMapper()->shouldReceive('saveModel')->with($eventModel)->andReturnNull()->once();

		$this->dispatch('/events/edit', 'POST', $dataPost);
		$this->assertRedirectTo('/events/review');
		$this->assertResponseStatusCode(302);
	}

	public function testEditEventActionFormValidInGetRequest() {
		$dataEvent = array(
			'id'		=>	'42',
			'member_id'	=>	'433'
		);

		$dataPost = array(
			'editEventForm'	=>	array(
				'minimum_age'		=>	'18 and older',
				'start_time'		=>	'01%3A00',
				'end_time'			=>	'13%3A00',
				'start_date'		=>	'2014-01-01',
				'end_date'			=>	'2014-01-01',
				'monthly_frequency'	=>	'Yearly',
				'contact_email'		=>	'example@gmail.com',
				'venue_id'			=>	'45',
				'will_stop'			=>	true,
				'repetitions'		=>	array(
					'0'		=>	array(
						'repetition_parameter'	=>	'months',
						'day_of_month'			=>	'2',
						'day_of_week'			=>	'Tuesday',
						'month_of_year'			=>	''
					)
				),
				'costs'		=>	array(
					'0'		=>	array(
						'person_type'	=>	'member',
						'amount'	=>	'24.00',
					)
				)

			)
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);

		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($eventModel)->once();

		$eventModel->setProperties($dataPost['editEventForm']);
		$eventModel->costs = [$this->getMockCostsMapper()->createModelFromData($dataPost['editEventForm']['costs']['0'])];
		$eventModel->repetitions = [$this->getMockRepetitionsMapper()->createModelFromData($dataPost['editEventForm']['repetitions']['0'])];
		$processResultSuccess = $this->getProcessResultSuccess($eventModel);
		$this->getMockEventsProcess()->shouldReceive('updateModel')->with($eventModel)->andReturn($processResultSuccess)->once();

		$this->dispatch('/events/edit/'.$dataEvent['id'], 'POST', $dataPost);
		$this->assertRedirectTo('/events/review/'.$dataEvent['id']);
		$this->assertResponseStatusCode(302);
	}

	public function testEditEventActionFormValidButUpdateModelProcessFailureInGetRequest() {
		$dataEvent = array(
			'id'		=>	'42',
			'name'		=>	'Swing With Me',
			'venue_id'	=>	'94'
		);
		$dataPost = array(
			'editEventForm'	=>	array(
				'minimum_age'		=>	'18 and older',
				'start_time'		=>	'01%3A00',
				'end_time'			=>	'13%3A00',
				'start_date'		=>	'2014-01-01',
				'end_date'			=>	'2014-01-01',
				'monthly_frequency'	=>	'Yearly',
				'contact_email'		=>	'example@gmail.com',
				'venue_id'			=>	$dataEvent['venue_id'],
				'will_stop'			=>	true
			)
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$repetitionModel = $this->getMockRepetitionsMapper()->createModelFromData();
		$costModel = $this->getMockCostsMapper()->createModelFromData();
		$venueModel = $this->getMockVenuesMapper()->createModelFromData();

		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($eventModel)->once();
		$this->getMockRepetitionsMapper()->shouldReceive('fetchManyForEventId')->with($dataEvent['id'])->andReturn([$repetitionModel, $repetitionModel])->twice();
		$this->getMockCostsMapper()->shouldReceive('fetchManyForEventId')->with($dataEvent['id'])->andReturn([$costModel, $costModel, $costModel])->times(3);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataEvent['venue_id'])->andReturn($venueModel)->once();
		$eventModel->setProperties($dataPost['editEventForm']);
		$processResultFailure = $this->getProcessResultFailure();
		$this->getMockEventsProcess()->shouldReceive('updateModel')->with($eventModel)->andReturn($processResultFailure)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with($processResultFailure->message)->andReturnNull()->once();

		$this->dispatch('/events/edit/'.$dataEvent['id'], 'POST', $dataPost);
		$this->assertNotRedirect('/events/edit/'.$dataEvent['id']);
		$this->assertResponseStatusCode(200);
	}

	public function testEditEventActionFormInvalidInSession() {
		$data = array(
			'name'		=>	'Swing With Me',
			'venue_id'	=>	'42'
		);
		$dataPost = array(
			'editEventForm'	=>	array(
				'monthly_frequency'	=>	'Yearly',
			)
		);
		$eventModel = $this->getMockSessionEventsMapper()->createModelFromData($data);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData();

		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($eventModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['venue_id'])->andReturn($venueModel)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/events/edit', 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$eventModelResultVariables = $this->getResultVariables('eventModel');
		$this->assertEquals($eventModel, $eventModelResultVariables);
	}

	public function testEditEventActionFormInvalidInGetRequest() {
		$data = array(
			'id'		=>	'23',
			'name'		=>	'Swing With Me',
			'venue_id'	=>	'42'
		);
		$dataPost = array(
			'editEventForm'	=>	array(
				'monthly_frequency'	=>	'Yearly',
			)
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($data);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData(['id' => $data['venue_id']]);
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($eventModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['venue_id'])->andReturn($venueModel)->once();

		$this->getMockCostsMapper()->shouldReceive('fetchManyForEventId')->with($data['id'])->andReturn([])->twice();
		$this->getMockRepetitionsMapper()->shouldReceive('fetchManyForEventId')->with($data['id'])->andReturn([])->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/events/edit/'.$data['id'], 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$eventModelResultVariables = $this->getResultVariables('eventModel');
		$this->assertEquals($eventModel, $eventModelResultVariables);
	}

	public function testReviewAction() {
		$dataEvent = array(
			'id'				=>	'24',
			'name'				=>	'Westie Wednesdays',
			'monthly_frequency'	=>	'Yearly',
			'venue_id'			=>	'45'
		);
		$dataVenue = array(
			'name'		=>	'Westie Wednesdays',
			'address_1'	=>	'48 Westlake Ave'
		);

		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);

		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($eventModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataEvent['venue_id'])->andReturn($venueModel)->times()->twice();

		$this->dispatch('/events/review/'.$dataEvent['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('events/review');
		$this->assertModuleName('Events');
		$this->assertControllerClass('EventsController');
		$this->assertActionName('review');

		$eventModelResultVariables = $this->getResultVariables('eventModel');

		$this->assertEquals($eventModel, $eventModelResultVariables);
	}

	public function testReviewActionNoEventModelFoundInGetRequest() {
		$data = array(
			'id'		=>	'24',
		);
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your event cannot be located for review. Please fill out your event information again.')->andReturnNull()->once();

		$this->dispatch('/events/review/'.$data['id']);
		$this->assertRedirectTo('/events/add');
		$this->assertResponseStatusCode(302);
	}

	public function testReviewActionNoEventModelFoundInSession() {
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your event cannot be located for review. Please fill out your event information again.')->andReturnNull()->once();

		$this->dispatch('/events/review');
		$this->assertRedirectTo('/events/add');
		$this->assertResponseStatusCode(302);
	}

	public function testReviewActionVenueModelFoundInDatabase() {
		$dataEvent = array(
			'name'				=>	'Westie Wednesdays',
			'monthly_frequency'	=>	'Yearly',
			'venue_id'			=>	'45'
		);
		$eventModel = $this->getMockSessionEventsMapper()->createModelFromData($dataEvent);
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($eventModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($eventModel->venue_id)->andReturnNull()->once();
		$this->setExpectedException('\Exception', "Venue: {$eventModel->venue_id} cannot be found.");

		$this->dispatch('/events/review');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);

		$returnedEventModel = $this->getResultVariables('eventModel');

		$this->assertEquals($eventModel, $returnedEventModel);
	}

	public function testApproveActionInSession() {
		$data = array(
			'name'				=>	'Westie Wednesdays',
			'monthly_frequency'	=>	'Yearly',
			'venue_id'			=>	'45'
		);
		$eventModel = $this->getMockSessionEventsMapper()->createModelFromData($data);
		$processResultSuccess = $this->getProcessResultSuccess();

		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($eventModel)->once();
		$this->getMockEventsProcess()->shouldReceive('insertModel')->with($eventModel)->andReturn($processResultSuccess)->once();
		$this->getMockEventsProcess()->shouldReceive('sendApprovalEmailToAdmin')->with($eventModel)->andReturn($processResultSuccess)->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with('You have successfully added an event to our site!')->andReturnNull()->once();

		$this->dispatch('/events/approve');
		$this->assertRedirectTo('/');
		$this->assertResponseStatusCode(302);
		$this->assertMatchedRouteName('events/approve');
		$this->assertModuleName('Events');
		$this->assertControllerClass('EventsController');
		$this->assertActionName('approve');
	}

	public function testApproveActionInGetRequest() {
		$data = array(
			'id'				=>	'26',
			'name'				=>	'Westie Wednesdays',
			'monthly_frequency'	=>	'Yearly',
			'venue_id'			=>	'45',
			'member_id'			=>	'42'
		);

		$eventModel = $this->getMockSessionEventsMapper()->createModelFromData($data);
		$processResultSuccess = $this->getProcessResultSuccess();
		$this->setLoggedInUserWithRole('admin');

		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($eventModel)->once();
		$this->getMockEventsProcess()->shouldReceive('updateModel')->with($eventModel)->andReturn($processResultSuccess)->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("You have successfully updated your event")->andReturnNull()->once();
		$this->getMockEventsProcess()->shouldReceive('sendApprovalEmailToAdmin')->with($eventModel)->andReturn($processResultSuccess)->once();

		$this->dispatch('/events/approve/'.$data['id']);
		$this->assertRedirectTo('/');
		$this->assertResponseStatusCode(302);
	}

	public function testApproveActionNoEventFoundInGetRequest() {
		$data = array(
			'id'		=>	'25',
			'member_id'	=>	'22'
		);
		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your event cannot be located for approval. Please fill out your event information again.')->andReturnNull()->once();

		$this->dispatch('/events/approve/'.$data['id']);
		$this->assertRedirectTo('/events/add');
		$this->assertResponseStatusCode(302);
	}

	public function testApproveActionInGetRequestProcessResultFailure() {
		$data = array(
			'id'				=>	'26',
			'name'				=>	'Westie Wednesdays',
			'monthly_frequency'	=>	'Yearly',
			'venue_id'			=>	'45',
			'member_id'			=>	'42'
		);

		$eventModel = $this->getMockSessionEventsMapper()->createModelFromData($data);
		$processResultFailure = $this->getProcessResultFailure();
		$this->setLoggedInUserWithRole('admin');

		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($eventModel)->once();
		$this->getMockEventsProcess()->shouldReceive('updateModel')->with($eventModel)->andReturn($processResultFailure)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with($processResultFailure->message)->andReturnNull()->once();

		$this->dispatch('/events/approve/'.$data['id']);
		$this->assertRedirectTo('/');
		$this->assertResponseStatusCode(302);
	}

	public function testApproveActionNoEventFoundInSession() {
		$this->getMockSessionEventsMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your event cannot be located for approval. Please fill out your event information again.')->andReturnNull()->once();

		$this->dispatch('/events/approve');
		$this->assertRedirectTo('/events/add');
		$this->assertResponseStatusCode(302);
	}


	public function testApproveActionMemberIdDoesNotMatchEventMemberId() {
		$dataEvent = array(
			'id'			=>	'28',
			'member_id'		=>	'222'
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$this->setLoggedInUserWithRole();

		$this->getMockEventsMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($eventModel)->once();
		$this->setExpectedException('\Exception', "You are not authorized to access event: {$eventModel->id}. Please make sure you are logged in.");

		$this->dispatch('/events/approve/'.$dataEvent['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}


	// ================================================================= FACTORY METHODS============================================================
	/**
	 * @return \Mockery\Mock|\Events\Mapper\CostsMapper
	 */
	private function getMockCostsMapper() {
		if (!isset($this->_mockCostsMapper)) $this->_mockCostsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\CostsMapper');
		return $this->_mockCostsMapper;
	}

	/**
	 * @return \Mockery\Mock|\Events\Mapper\EventsMapper
	 */
	private function getMockEventsMapper() {
		if (!isset($this->_mockEventsMapper)) $this->_mockEventsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\EventsMapper');
		return $this->_mockEventsMapper;
	}

	/**
	 * @return \Mockery\Mock|\Registration\Mapper\MembersMapper
	 */
	private function getMockMembersMapper() {
		if (!isset($this->_mockMembersMapper)) $this->_mockMembersMapper = $this->getApplicationServiceLocator()->get('\Registration\Mapper\MembersMapper');
		return $this->_mockMembersMapper;
	}

	/**
	 * @return \Mockery\Mock|\Events\Mapper\RepetitionsMapper
	 */
	private function getMockRepetitionsMapper() {
		if (!isset($this->_mockRepetitionsMapper)) $this->_mockRepetitionsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\RepetitionsMapper');
		return $this->_mockRepetitionsMapper;
	}

	/**
	 * @return \Mockery\Mock|\Venues\Mapper\VenuesMapper
	 */
	private function getMockVenuesMapper() {
		if (!isset($this->_mockVenuesMapper)) $this->_mockVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_mockVenuesMapper;
	}

	/**
	 * @return \Mockery\Mock|\Events\Mapper\SessionEventsMapper
	 */
	private function getMockSessionEventsMapper() {
		if (!isset($this->_mockSessionEventsMapper)) $this->_mockSessionEventsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\SessionEventsMapper');
		return $this->_mockSessionEventsMapper;
	}

	/**
	 * @return \Mockery\Mock|\Events\Process\EventsProcess
	 */
	protected function getMockEventsProcess() {
		if (!isset($this->_mockEventsProcess)) $this->_mockEventsProcess = $this->getApplicationServiceLocator()->get('\Events\Process\EventsProcess');
		return $this->_mockEventsProcess;
	}

}