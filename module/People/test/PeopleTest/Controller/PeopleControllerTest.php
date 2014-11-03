<?php
namespace PeopleTest\Controller;

use Application\Constants\MessageConstants;

class PeopleControllerTest extends \NovumWare\Test\Controller\AbstractControllerTest
{
	public function testAddEventAction() {
		$dataEvent = array(
			'name'	=>	'Wed night swing'
		);

		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);
		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($personModel)->once();

		$this->dispatch('/people/add');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$personModelResultVariables = $this->getResultVariables('personModel');
		$this->assertEquals($personModel, $personModelResultVariables);
	}

	public function testAddEventActionFormValid() {
		$personModel = $this->getMockPeopleMapper()->createModelFromData();
		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($personModel)->once();
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
		$newEventModel = $personModel->setProperties($dataPost['addEventForm']);
		$processResultSuccess = $this->getProcessResultSuccess($newEventModel);
		$this->getMockPeopleProcess()->shouldReceive('saveModel')->with($personModel)->andReturn($processResultSuccess)->once();

		$this->dispatch('/people/add', 'POST', $dataPost);
		$this->assertResponseStatusCode(302);
		$this->assertRedirectTo('/people/review');
	}

	public function testAddEventActionFormInvalid() {
		$dataPost = array(
			'addEventForm'	=>	array(
				'name'				=>	'Westie Wednesdays',
				'monthly_frequency'	=>	'Yearly',
			)
		);
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataPost['addEventForm']);
		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->andReturn($personModel)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/people/add', 'POST', $dataPost);
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
		$expectedEventModel = $this->getMockSessionPeopleMapper()->createModelFromData($dataEvent);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($expectedEventModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataEvent['venue_id'])->andReturn($venueModel)->once();
		$this->dispatch('/people/edit');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('people/edit');
		$this->assertModuleName('People');
		$this->assertControllerClass('PeopleController');
		$this->assertActionName('edit');
		$personModelResultVariables = $this->getResultVariables('personModel');
		$this->assertEquals($expectedEventModel, $personModelResultVariables);
	}

	public function testEditEventActionNoEventFoundInGetRequest() {
		$dataEvent = array(
			'id'		=>	'42',
			'member_id'	=>	'433'
		);
		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your person cannot be located for editting. Please fill out your person information again.')->andReturnNull()->once();

		$this->dispatch('/people/edit/'.$dataEvent['id']);
		$this->assertRedirectTo('/people/add');
		$this->assertResponseStatusCode(302);
	}

	public function testEditEventActionWithGetRequest() {
		$dataRepetition = array(
			'id'					=>	'45',
			'repetition_parameter'	=>	'weeks',
			'person_id'				=>	'42',
			'day_of_week'			=>	'Tuesday',
			'day_of_month'			=>	'3',
			'month_of_year'			=>	''
		);
		$dataCost = array(
			'id'		=>	'23',
			'person_id'	=>	'42'
		);
		$repetitionModel = $this->getMockRepetitionsMapper()->createModelFromData($dataRepetition);
		$costModel = $this->getMockCostsMapper()->createModelFromData($dataCost);

		$dataEvent = array(
			'id'			=>	'42',
			'member_id'		=>	'433',
			'costs'			=>	[$costModel, $costModel, $costModel],
			'repetitions'	=>	[$repetitionModel, $repetitionModel]
		);
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);

		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($personModel)->once();
		$this->getMockRepetitionsMapper()->shouldReceive('fetchManyForEventId')->with($dataEvent['id'])->andReturn([$repetitionModel, $repetitionModel])->twice();
		$this->getMockCostsMapper()->shouldReceive('fetchManyForEventId')->with($dataEvent['id'])->andReturn([$costModel, $costModel, $costModel])->times(3);

		$this->dispatch('/people/edit/'.$dataEvent['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$personModelResultVariables = $this->getResultVariables('personModel');

		$this->assertEquals($personModel, $personModelResultVariables);
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
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);
		$this->setLoggedInUserWithRole();
		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($personModel)->once();
		$this->setExpectedException('\Exception', "You are not authorized to access person: {$personModel->id}. Please make sure you are logged in.");

		$this->dispatch('/people/edit/'.$dataEvent['id']);
		$this->assertRedirectTo('/account');
		$this->assertResponseStatusCode(302);
	}

	public function testEditEventActionNoEventFoundInSession() {
		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your person cannot be located for editting. Please fill out your person information again.')->andReturnNull()->once();

		$this->dispatch('/people/edit');
		$this->assertRedirectTo('/people/add');
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
		$personModel = $this->getMockPeopleMapper()->createModelFromData($data);

		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($personModel)->once();
		$personModel->setProperties($dataPost['editEventForm']);
		$this->getMockSessionPeopleMapper()->shouldReceive('saveModel')->with($personModel)->andReturnNull()->once();

		$this->dispatch('/people/edit', 'POST', $dataPost);
		$this->assertRedirectTo('/people/review');
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
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);

		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($personModel)->once();

		$personModel->setProperties($dataPost['editEventForm']);
		$personModel->costs = [$this->getMockCostsMapper()->createModelFromData($dataPost['editEventForm']['costs']['0'])];
		$personModel->repetitions = [$this->getMockRepetitionsMapper()->createModelFromData($dataPost['editEventForm']['repetitions']['0'])];
		$processResultSuccess = $this->getProcessResultSuccess($personModel);
		$this->getMockPeopleProcess()->shouldReceive('updateModel')->with($personModel)->andReturn($processResultSuccess)->once();

		$this->dispatch('/people/edit/'.$dataEvent['id'], 'POST', $dataPost);
		$this->assertRedirectTo('/people/review/'.$dataEvent['id']);
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
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);
		$repetitionModel = $this->getMockRepetitionsMapper()->createModelFromData();
		$costModel = $this->getMockCostsMapper()->createModelFromData();
		$venueModel = $this->getMockVenuesMapper()->createModelFromData();

		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($personModel)->once();
		$this->getMockRepetitionsMapper()->shouldReceive('fetchManyForEventId')->with($dataEvent['id'])->andReturn([$repetitionModel, $repetitionModel])->twice();
		$this->getMockCostsMapper()->shouldReceive('fetchManyForEventId')->with($dataEvent['id'])->andReturn([$costModel, $costModel, $costModel])->times(3);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataEvent['venue_id'])->andReturn($venueModel)->once();
		$personModel->setProperties($dataPost['editEventForm']);
		$processResultFailure = $this->getProcessResultFailure();
		$this->getMockPeopleProcess()->shouldReceive('updateModel')->with($personModel)->andReturn($processResultFailure)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with($processResultFailure->message)->andReturnNull()->once();

		$this->dispatch('/people/edit/'.$dataEvent['id'], 'POST', $dataPost);
		$this->assertNotRedirect('/people/edit/'.$dataEvent['id']);
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
		$personModel = $this->getMockSessionPeopleMapper()->createModelFromData($data);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData();

		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($personModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['venue_id'])->andReturn($venueModel)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/people/edit', 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$personModelResultVariables = $this->getResultVariables('personModel');
		$this->assertEquals($personModel, $personModelResultVariables);
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
		$personModel = $this->getMockPeopleMapper()->createModelFromData($data);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData(['id' => $data['venue_id']]);
		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($personModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['venue_id'])->andReturn($venueModel)->once();

		$this->getMockCostsMapper()->shouldReceive('fetchManyForEventId')->with($data['id'])->andReturn([])->twice();
		$this->getMockRepetitionsMapper()->shouldReceive('fetchManyForEventId')->with($data['id'])->andReturn([])->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/people/edit/'.$data['id'], 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$personModelResultVariables = $this->getResultVariables('personModel');
		$this->assertEquals($personModel, $personModelResultVariables);
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

		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);

		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($personModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataEvent['venue_id'])->andReturn($venueModel)->times()->twice();

		$this->dispatch('/people/review/'.$dataEvent['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('people/review');
		$this->assertModuleName('People');
		$this->assertControllerClass('PeopleController');
		$this->assertActionName('review');

		$personModelResultVariables = $this->getResultVariables('personModel');

		$this->assertEquals($personModel, $personModelResultVariables);
	}

	public function testReviewActionNoEventModelFoundInGetRequest() {
		$data = array(
			'id'		=>	'24',
		);
		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your person cannot be located for review. Please fill out your person information again.')->andReturnNull()->once();

		$this->dispatch('/people/review/'.$data['id']);
		$this->assertRedirectTo('/people/add');
		$this->assertResponseStatusCode(302);
	}

	public function testReviewActionNoEventModelFoundInSession() {
		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your person cannot be located for review. Please fill out your person information again.')->andReturnNull()->once();

		$this->dispatch('/people/review');
		$this->assertRedirectTo('/people/add');
		$this->assertResponseStatusCode(302);
	}

	public function testReviewActionVenueModelFoundInDatabase() {
		$dataEvent = array(
			'name'				=>	'Westie Wednesdays',
			'monthly_frequency'	=>	'Yearly',
			'venue_id'			=>	'45'
		);
		$personModel = $this->getMockSessionPeopleMapper()->createModelFromData($dataEvent);
		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($personModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($personModel->venue_id)->andReturnNull()->once();
		$this->setExpectedException('\Exception', "Venue: {$personModel->venue_id} cannot be found.");

		$this->dispatch('/people/review');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);

		$returnedEventModel = $this->getResultVariables('personModel');

		$this->assertEquals($personModel, $returnedEventModel);
	}

	public function testApproveActionInSession() {
		$data = array(
			'name'				=>	'Westie Wednesdays',
			'monthly_frequency'	=>	'Yearly',
			'venue_id'			=>	'45'
		);
		$personModel = $this->getMockSessionPeopleMapper()->createModelFromData($data);
		$processResultSuccess = $this->getProcessResultSuccess();

		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($personModel)->once();
		$this->getMockPeopleProcess()->shouldReceive('insertModel')->with($personModel)->andReturn($processResultSuccess)->once();
		$this->getMockPeopleProcess()->shouldReceive('sendApprovalEmailToAdmin')->with($personModel)->andReturn($processResultSuccess)->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with('You have successfully added an person to our site!')->andReturnNull()->once();

		$this->dispatch('/people/approve');
		$this->assertRedirectTo('/');
		$this->assertResponseStatusCode(302);
		$this->assertMatchedRouteName('people/approve');
		$this->assertModuleName('People');
		$this->assertControllerClass('PeopleController');
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

		$personModel = $this->getMockSessionPeopleMapper()->createModelFromData($data);
		$processResultSuccess = $this->getProcessResultSuccess();
		$this->setLoggedInUserWithRole('admin');

		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($personModel)->once();
		$this->getMockPeopleProcess()->shouldReceive('updateModel')->with($personModel)->andReturn($processResultSuccess)->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("You have successfully updated your person")->andReturnNull()->once();
		$this->getMockPeopleProcess()->shouldReceive('sendApprovalEmailToAdmin')->with($personModel)->andReturn($processResultSuccess)->once();

		$this->dispatch('/people/approve/'.$data['id']);
		$this->assertRedirectTo('/');
		$this->assertResponseStatusCode(302);
	}

	public function testApproveActionNoEventFoundInGetRequest() {
		$data = array(
			'id'		=>	'25',
			'member_id'	=>	'22'
		);
		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your person cannot be located for approval. Please fill out your person information again.')->andReturnNull()->once();

		$this->dispatch('/people/approve/'.$data['id']);
		$this->assertRedirectTo('/people/add');
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

		$personModel = $this->getMockSessionPeopleMapper()->createModelFromData($data);
		$processResultFailure = $this->getProcessResultFailure();
		$this->setLoggedInUserWithRole('admin');

		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($personModel)->once();
		$this->getMockPeopleProcess()->shouldReceive('updateModel')->with($personModel)->andReturn($processResultFailure)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with($processResultFailure->message)->andReturnNull()->once();

		$this->dispatch('/people/approve/'.$data['id']);
		$this->assertRedirectTo('/');
		$this->assertResponseStatusCode(302);
	}

	public function testApproveActionNoEventFoundInSession() {
		$this->getMockSessionPeopleMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your person cannot be located for approval. Please fill out your person information again.')->andReturnNull()->once();

		$this->dispatch('/people/approve');
		$this->assertRedirectTo('/people/add');
		$this->assertResponseStatusCode(302);
	}


	public function testApproveActionMemberIdDoesNotMatchEventMemberId() {
		$dataEvent = array(
			'id'			=>	'28',
			'member_id'		=>	'222'
		);
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);
		$this->setLoggedInUserWithRole();

		$this->getMockPeopleMapper()->shouldReceive('fetchOneForId')->with($dataEvent['id'])->andReturn($personModel)->once();
		$this->setExpectedException('\Exception', "You are not authorized to access person: {$personModel->id}. Please make sure you are logged in.");

		$this->dispatch('/people/approve/'.$dataEvent['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}


	// ================================================================= FACTORY METHODS============================================================
	/**
	 * @return \Mockery\Mock|\People\Mapper\CostsMapper
	 */
	private function getMockCostsMapper() {
		if (!isset($this->_mockCostsMapper)) $this->_mockCostsMapper = $this->getApplicationServiceLocator()->get('\People\Mapper\CostsMapper');
		return $this->_mockCostsMapper;
	}

	/**
	 * @return \Mockery\Mock|\People\Mapper\PeopleMapper
	 */
	private function getMockPeopleMapper() {
		if (!isset($this->_mockPeopleMapper)) $this->_mockPeopleMapper = $this->getApplicationServiceLocator()->get('\People\Mapper\PeopleMapper');
		return $this->_mockPeopleMapper;
	}

	/**
	 * @return \Mockery\Mock|\Registration\Mapper\MembersMapper
	 */
	private function getMockMembersMapper() {
		if (!isset($this->_mockMembersMapper)) $this->_mockMembersMapper = $this->getApplicationServiceLocator()->get('\Registration\Mapper\MembersMapper');
		return $this->_mockMembersMapper;
	}

	/**
	 * @return \Mockery\Mock|\People\Mapper\RepetitionsMapper
	 */
	private function getMockRepetitionsMapper() {
		if (!isset($this->_mockRepetitionsMapper)) $this->_mockRepetitionsMapper = $this->getApplicationServiceLocator()->get('\People\Mapper\RepetitionsMapper');
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
	 * @return \Mockery\Mock|\People\Mapper\SessionPeopleMapper
	 */
	private function getMockSessionPeopleMapper() {
		if (!isset($this->_mockSessionPeopleMapper)) $this->_mockSessionPeopleMapper = $this->getApplicationServiceLocator()->get('\People\Mapper\SessionPeopleMapper');
		return $this->_mockSessionPeopleMapper;
	}

	/**
	 * @return \Mockery\Mock|\People\Process\PeopleProcess
	 */
	protected function getMockPeopleProcess() {
		if (!isset($this->_mockPeopleProcess)) $this->_mockPeopleProcess = $this->getApplicationServiceLocator()->get('\People\Process\PeopleProcess');
		return $this->_mockPeopleProcess;
	}

}