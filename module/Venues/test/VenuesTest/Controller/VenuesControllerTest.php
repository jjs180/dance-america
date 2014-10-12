<?php
namespace VenuesTest\Controller;

use Application\Constants\MessageConstants;

class VenuesControllerTest extends \NovumWare\Test\Controller\AbstractControllerTest
{
	public function testSearchVenuesAction() {
		$this->dispatch('/venues/search');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('venues/search');
		$this->assertModuleName('Venues');
		$this->assertControllerClass('VenuesController');
		$this->assertActionName('search');
	}

	public function testSearchVenuesActionFormValid() {
		$dataPost = array(
			'searchVenuesForm'	=>	array(
				'search_criteria'	=>	'city',
				'search_param'		=>	'los angeles',
				'event_id'			=>	'0'
			)
		);
		$dataVenue = array(
			'city'	=>	'Los Angeles'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
//		$this->getMockVenuesMapper()->shouldReceive('fetchManyForName')->with($dataPost['searchVenuesForm']['search_param'])->andReturn([$venueModel, $venueModel])->once();

		$this->dispatch('/venues/search', 'POST', $dataPost);
		$this->assertRedirectTo('/venues/search/0/results/city/los%20angeles');
		$this->assertResponseStatusCode(302);
	}

	public function testSearchVenuesActionFormInvalid() {
		$dataPost = array(
			'searchVenuesForm'	=>	array(
				'search_criteria'	=>	'city',
				'search_param'		=>	'',
				'event_id'			=>	'0'
			)
		);
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/venues/search/0', 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$resultVariables = $this->getResultVariables('eventId');
		$this->assertEquals('0', $resultVariables);
	}

	public function testResultsActionFormValidSearchName() {
		$data = array(
			'name'	=>	'Westie LA'
		);
		$dataParams = array(
			'eventId'			=>	'28',
			'searchCriteria'	=>	'name',
			'searchPhrase'		=>	'Example'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$venueModelsArrayExpected = [$venueModel, $venueModel, $venueModel];
		$this->getMockVenuesMapper()->shouldReceive('fetchManyForName')->with($dataParams['searchPhrase'])->andReturn($venueModelsArrayExpected)->once();

		$this->dispatch('/venues/search/'.$dataParams['eventId'].'/results/'.$dataParams['searchCriteria'].'/'.$dataParams['searchPhrase']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('venues/search/results');
		$this->assertModuleName('Venues');
		$this->assertControllerClass('VenuesController');
		$this->assertActionName('results');
		$this->getResultVariables('venueModelsArray');
		$searchCriteriaResultVariables = $this->getResultVariables('searchCriteria');
		$searchPhraseResultVariables = $this->getResultVariables('searchPhrase');
		$eventIdResultVariables = $this->getResultVariables('eventId');
		$this->assertEquals($dataParams['searchCriteria'], $searchCriteriaResultVariables);
		$this->assertEquals($dataParams['searchPhrase'], $searchPhraseResultVariables);
		$this->assertEquals($dataParams['eventId'], $eventIdResultVariables);
	}

	public function testResultsActionFormValidSearchCity() {
		$data = array(
			'city'	=>	'Los Angeles'
		);
		$dataGet = array(
				'eventId'			=>	'0',
				'searchPhrase'		=>	'los Angeles',
				'searchCriteria'	=>	'city'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$venueModelsArrayExpected = [$venueModel, $venueModel, $venueModel];
		$this->getMockVenuesMapper()->shouldReceive('fetchManyForCity')->with($dataGet['searchPhrase'])->andReturn($venueModelsArrayExpected)->once();

		$this->dispatch('/venues/search/'.$dataGet['eventId'].'/results/'.$dataGet['searchCriteria'].'/'.$dataGet['searchPhrase']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$venueModelsArrayResultVariables = $this->getResultVariables('venueModelsArray');
		$this->assertEquals($venueModelsArrayExpected, $venueModelsArrayResultVariables);
	}

	public function testResultsActionFormValidSearchState() {
		$data = array(
			'state'	=>	'CA'
		);
		$dataGet = array(
				'eventId'			=>	'0',
				'searchPhrase'		=>	'CA',
				'searchCriteria'	=>	'state'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$venueModelsArrayExpected = [$venueModel, $venueModel, $venueModel];
		$this->getMockVenuesMapper()->shouldReceive('fetchManyForState')->with($dataGet['searchPhrase'])->andReturn($venueModelsArrayExpected)->once();

		$this->dispatch('/venues/search/'.$dataGet['eventId'].'/results/'.$dataGet['searchCriteria'].'/'.$dataGet['searchPhrase']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$venueModelsArrayResultVariables = $this->getResultVariables('venueModelsArray');
		$this->assertEquals($venueModelsArrayExpected, $venueModelsArrayResultVariables);
	}

	public function testResultsActionFormValidSearchPostalCode() {
		$data = array(
			'postal_code'	=>	'90012'
		);
		$dataGet = array(
				'eventId'			=>	'2',
				'searchPhrase'		=>	'90012',
				'searchCriteria'	=>	'postal code'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$venueModelsArrayExpected = [$venueModel, $venueModel, $venueModel];
		$this->getMockVenuesMapper()->shouldReceive('fetchManyForPostalCode')->with($dataGet['searchPhrase'])->andReturn($venueModelsArrayExpected)->once();

		$this->dispatch('/venues/search/'.$dataGet['eventId'].'/results/'.$dataGet['searchCriteria'].'/'.$dataGet['searchPhrase']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$venueModelsArrayResultVariables = $this->getResultVariables('venueModelsArray');
		$this->assertEquals($venueModelsArrayExpected, $venueModelsArrayResultVariables);
	}

	public function testResultsActionFormValidSearchCountry() {
		$data = array(
			'country'	=>	'USA'
		);
		$dataGet = array(
				'eventId'			=>	'2',
				'searchPhrase'		=>	'USA',
				'searchCriteria'	=>	'country'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$venueModelsArrayExpected = [$venueModel, $venueModel, $venueModel];
		$this->getMockVenuesMapper()->shouldReceive('fetchManyForCountry')->with($dataGet['searchPhrase'])->andReturn($venueModelsArrayExpected)->once();

		$this->dispatch('/venues/search/'.$dataGet['eventId'].'/results/'.$dataGet['searchCriteria'].'/'.$dataGet['searchPhrase']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$venueModelsArrayResultVariables = $this->getResultVariables('venueModelsArray');
		$this->assertEquals($venueModelsArrayExpected, $venueModelsArrayResultVariables);
	}

	public function testResultsActionFormValidNothingFound() {
		$dataGet = array(
				'eventId'			=>	'2',
				'searchPhrase'		=>	'USA',
				'searchCriteria'	=>	'country'
		);
		$this->getMockVenuesMapper()->shouldReceive('fetchManyForCountry')->with($dataGet['searchPhrase'])->andReturn([])->once();

		$this->dispatch('/venues/search/'.$dataGet['eventId'].'/results/'.$dataGet['searchCriteria'].'/'.$dataGet['searchPhrase']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$venueModelsArrayResultVariables = $this->getResultVariables('venueModelsArray');
		$this->assertEquals([], $venueModelsArrayResultVariables);
	}

	public function testResultsActionInvalidSearchCriteria() {
		$dataGet = array(
				'eventId'			=>	'2',
				'searchPhrase'		=>	'USA',
				'searchCriteria'	=>	'gobble'
		);
		$this->setExpectedException('\Exception', 'You are not searching with valid criteria');

		$this->dispatch('/venues/search/'.$dataGet['eventId'].'/results/'.$dataGet['searchCriteria'].'/'.$dataGet['searchPhrase']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testResultsActionFormInvalid() {
		$dataGet = array(
				'eventId'			=>	'2',
				'searchCriteria'	=>	'gobble',
				'searchPhrase'		=>	'aha'
		);

		$this->setExpectedException('\Exception', 'You are not searching with valid criteria');
		$this->dispatch('/venues/search/'.$dataGet['eventId'].'/results/'.$dataGet['searchCriteria'].'/'.$dataGet['searchPhrase']);
		$this->assertRedirectTo('/venues/search');
		$this->assertResponseStatusCode(302);
	}

	public function testAddVenueAction() {
		$data = array(
			'name'	=>	'example venue name'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();

		$this->dispatch('/venues/add');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('venues/add');
		$this->assertModuleName('Venues');
		$this->assertControllerClass('VenuesController');
		$this->assertActionName('add');
	}

	public function testAddVenueActionFormValid() {
		$venueModel = $this->getMockVenuesMapper()->createModelFromData();
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();

		$dataPost = array(
			'addVenueForm'		=>	array(
				'name'			=>	'Westie Wednesdays',
				'address_1'		=>	'880 N sdflkjsd',
				'address_2'		=>	'#127',
				'city'			=>	'Los Angeles',
				'state'			=>	'CA',
				'postal_code'	=>	'90012',
				'country'		=>	'USA',
				'type'			=>	'Bar',
				'minimum_age'	=>	'None',
				'url'			=>	'',
				'special_notes'	=>	'',
				'description'	=>	'',
				'contact_email'	=>	''
			)
		);
		$newVenueModel = $venueModel;
		$newVenueModel->setProperties($dataPost['addVenueForm']);
		$processResultSuccess = $this->getProcessResultSuccess($newVenueModel);
		$this->getMockVenuesProcess()->shouldReceive('setVenuePropertiesFromForm')->with($this->compareModel($venueModel), $this->compareArray($dataPost['addVenueForm']))->andReturn($processResultSuccess)->once();
		$this->getMockSessionVenuesMapper()->shouldReceive('saveModel')->with($this->compareModel($newVenueModel))->andReturnNull()->once();

		$this->dispatch('/venues/add', 'POST', $dataPost);
		$this->assertRedirectTo('/venues/review');
		$this->assertResponseStatusCode(302);
	}

	public function testAddVenueActionFormInvalid() {
		$dataPost = array(
			'addVenueForm'	=>	array(
				'name'			=>	'Westie Wednesdays',
				'address_1'		=>	'880 N sdflkjsd',
				'city'			=>	'Los Angeles',
				'state'			=>	'CA',
				'postal_code'	=>	'90012',
				'country'		=>	'USA'
			)
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData();
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/venues/add', 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testAddVenueActionFormValidButProcessFailure() {
		$venueModel = $this->getMockVenuesMapper()->createModelFromData();
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();

		$dataPost = array(
			'addVenueForm'		=>	array(
				'name'			=>	'Westie Wednesdays',
				'address_1'		=>	'880 N sdflkjsd',
				'address_2'		=>	'#127',
				'city'			=>	'Los Angeles',
				'state'			=>	'CA',
				'postal_code'	=>	'90012',
				'country'		=>	'USA',
				'type'			=>	'Bar',
				'minimum_age'	=>	'None',
				'url'			=>	'',
				'special_notes'	=>	'',
				'description'	=>	'',
				'contact_email'	=>	''
			)
		);
		$processResultFailure = $this->getProcessResultFailure();
		$this->getMockVenuesProcess()->shouldReceive('setVenuePropertiesFromForm')->with($this->compareModel($venueModel), $this->compareArray($dataPost['addVenueForm']))->andReturn($processResultFailure)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with($processResultFailure->message)->andReturnNull()->once();

		$this->dispatch('/venues/add', 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$venueModelResultVariables = $this->getResultVariables('venueModel');
		$this->assertEquals($venueModel, $venueModelResultVariables);
	}

	public function testEditVenueActionFromSession() {
		$data = array(
			'name'			=>	'Westie Wednesdays',
			'address_1'		=>	'880 N sdflkjsd',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA',
			'type'			=>	'Bar',
			'minimum_age'	=>	'None',
		);
		$expectedEventModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($expectedEventModel)->once();

		$this->dispatch('/venues/edit');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('venues/edit');
		$this->assertModuleName('Venues');
		$this->assertControllerClass('VenuesController');
		$this->assertActionName('edit');
		$venueModelResultVariables = $this->getResultVariables('venueModel');
		$this->assertEquals($expectedEventModel, $venueModelResultVariables);
	}

	public function testEditVenueActionNoVenueFoundInSession() {
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your venue cannot be located for editting. Please fill out your venue information again.')->andReturnNull()->once();

		$this->dispatch('/venues/edit');
		$this->assertRedirectTo('/venues/add');
		$this->assertResponseStatusCode(302);
	}

	public function testEditVenueActionFormValidFromSession() {
		$data = array(
			'address_1'	=>	'example address st',
			'name'		=>	'Swing With Me',
		);
		$dataPost = array(
			'editVenueForm'	=>	array(
				'name'			=>	'Westie Wednesdays',
				'address_1'		=>	'880 N sdflkjsd',
				'address_2'		=>	'#127',
				'city'			=>	'Los Angeles',
				'state'			=>	'CA',
				'postal_code'	=>	'90012',
				'country'		=>	'USA',
				'type'			=>	'Bar',
				'minimum_age'	=>	'None',
				'contact_email'	=>	'example@gmail.com',
				'url'			=>	'',
				'special_notes'	=>	'',
				'description'	=>	'',
				'contact_email'	=>	''
			)
		);
		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData($data);

		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();
		$venueModel->setProperties($dataPost['editVenueForm']);
		$processResultSuccess = $this->getProcessResultSuccess($venueModel);
		$this->getMockVenuesProcess()->shouldReceive('setVenuePropertiesFromForm')->with($venueModel, $dataPost['editVenueForm'])->andReturn($processResultSuccess)->once();
		$this->getMockSessionVenuesMapper()->shouldReceive('saveModel')->with($venueModel)->andReturnNull()->once();

		$this->dispatch('/venues/edit', 'POST', $dataPost);
		$this->assertRedirectTo('/venues/review');
		$this->assertResponseStatusCode(302);
	}

	public function testEditVenueActionFormInvalidFromSession() {
		$data = array(
			'id'	=>	'38',
			'name'	=>	'Swing With Me'
		);
		$dataPost = array(
			'editVenueForm'	=>	array(
				'monthly_frequency'	=>	'Yearly',
			)
		);
		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData($data);
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->dispatch('/venues/edit', 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$venueModelResultVariables = $this->getResultVariables('venueModel');
		$this->assertEquals($venueModel, $venueModelResultVariables);
	}

	public function testEditVenueActionUsingGetRequest() {
		$data = array(
			'id'			=>	'24',
			'name'			=>	'Westie Wednesdays',
			'address_1'		=>	'880 N sdflkjsd',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA',
			'type'			=>	'Bar',
			'minimum_age'	=>	'None',
			'member_id'		=>	'42'
		);
		$expectedVenueModel = $this->getMockSessionVenuesMapper()->createModelFromData($data);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($expectedVenueModel)->once();
		$this->setLoggedInUserWithRole('admin');

		$this->dispatch('/venues/edit/'.$data['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$venueModelResultVariables = $this->getResultVariables('venueModel');
		$this->assertEquals($expectedVenueModel, $venueModelResultVariables);
	}

	public function testEditVenueActionFormValidFromGetRequest() {
		$data = array(
			'id'		=>	'43',
			'address_1'	=>	'example address st',
			'name'		=>	'Swing With Me',
		);
		$dataPost = array(
			'editVenueForm'	=>	array(
				'name'			=>	'Westie Wednesdays',
				'address_1'		=>	'880 N sdflkjsd',
				'address_2'		=>	'#127',
				'city'			=>	'Los Angeles',
				'state'			=>	'CA',
				'postal_code'	=>	'90012',
				'country'		=>	'USA',
				'type'			=>	'Bar',
				'minimum_age'	=>	'None',
				'contact_email'	=>	'example@gmail.com',
				'url'			=>	'',
				'special_notes'	=>	'',
				'description'	=>	'',
				'contact_email'	=>	''
			)
		);
		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData($data);

		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($venueModel)->once();
		$venueModel->setProperties($dataPost['editVenueForm']);
		$processResultSuccess = $this->getProcessResultSuccess($venueModel);
		$this->getMockVenuesProcess()->shouldReceive('setVenuePropertiesFromForm')->with($venueModel, $dataPost['editVenueForm'])->andReturn($processResultSuccess)->once();
		$this->getMockVenuesMapper()->shouldReceive('updateModel')->with($venueModel)->andReturnNull()->once();

		$this->dispatch('/venues/edit/'.$data['id'], 'POST', $dataPost);
		$this->assertRedirectTo('/venues/review/'.$data['id']);
		$this->assertResponseStatusCode(302);
	}

	public function testEditVenueActionFormValidFromGetRequestProcessUpdateFailure() {
		$data = array(
			'id'		=>	'43',
			'address_1'	=>	'example address st',
			'name'		=>	'Swing With Me',
		);
		$dataPost = array(
			'editVenueForm'	=>	array(
				'name'			=>	'Westie Wednesdays',
				'address_1'		=>	'880 N sdflkjsd',
				'address_2'		=>	'#127',
				'city'			=>	'Los Angeles',
				'state'			=>	'CA',
				'postal_code'	=>	'90012',
				'country'		=>	'USA',
				'type'			=>	'Bar',
				'minimum_age'	=>	'None',
				'contact_email'	=>	'example@gmail.com',
				'url'			=>	'',
				'special_notes'	=>	'',
				'description'	=>	'',
				'contact_email'	=>	''
			)
		);
		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData($data);

		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($venueModel)->once();
		$venueModel->setProperties($dataPost['editVenueForm']);
		$processResultFailure = $this->getProcessResultFailure();
		$this->getMockVenuesProcess()->shouldReceive('setVenuePropertiesFromForm')->with($venueModel, $dataPost['editVenueForm'])->andReturn($processResultFailure)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with($processResultFailure->message)->andReturnNull()->once();

		$this->dispatch('/venues/edit/'.$data['id'], 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testEditVenueActionNoVenueFoundFromGetRequest() {
		$data = array(
			'id'	=>	'28',
			'name'	=>	'City Swingers'
		);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your venue cannot be located for editting. Please fill out your venue information again.')->andReturnNull()->once();

		$this->setLoggedInUserWithRole();
		$this->dispatch('/venues/edit/'.$data['id']);
		$this->assertRedirectTo('/venues/add');
		$this->assertResponseStatusCode(302);
	}

	public function testEditVenueActionUsingGetRequestNotAuthorized() {
		$dataMember = array(
			'id'	=>	'10',
			'name'	=>	'Cara'
		);
		$dataVenue = array(
			'id'			=>	'24',
			'name'			=>	'Westie Wednesdays',
			'address_1'		=>	'880 N sdflkjsd',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA',
			'type'			=>	'Bar',
			'minimum_age'	=>	'None',
			'member_id'		=>	$dataMember['id']
		);
		$expectedVenueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataVenue['id'])->andReturn($expectedVenueModel)->once();
		$this->setExpectedException('\Exception', "You are not authorized to access event: {$expectedVenueModel->id}. Please make sure you are logged in.");

		$this->setLoggedInUserWithRole('member');
 		$this->dispatch('/venues/edit/'.$dataVenue['id']);
 		$this->assertResponseStatusCode(200);
 		$this->assertNotRedirect();
	}

	public function testReviewActionUsingSession() {
 		$dataVenue = array(
 			'name'			=>	'Westie Wednesdays',
 			'minimum_age'	=>	'18 and over',
			'address_1'		=>	'880 N sdflkjsd',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA',
			'contact_email'	=>	'carax@gmail.com'
 		);

 		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData($dataVenue);

 		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();

 		$this->dispatch('/venues/review');
 		$this->assertNotRedirect();
 		$this->assertResponseStatusCode(200);
 		$this->assertMatchedRouteName('venues/review');
 		$this->assertModuleName('Venues');
 		$this->assertControllerClass('VenuesController');
 		$this->assertActionName('review');

 		$resultVariables = $this->getResultVariables();
 		$venueModelResultvariables = $this->getResultVariables('venueModel');

		$this->assertArrayHasKey('url', $resultVariables);
 		$this->assertEquals($venueModel, $venueModelResultvariables);
	}

	public function testReviewActionNoVenueModelFoundUsingSession() {
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
 		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your venue cannot be located for review. Please fill out your venue information again.')->andReturnNull()->once();

 		$this->dispatch('/venues/review');
 		$this->assertRedirectTo('/venues/add');
 		$this->assertResponseStatusCode(302);
 	}

	public function testReviewActionUsingGetRequest() {
 		$dataVenue = array(
 			'id'			=>	'34',
 			'name'			=>	'Westie Wednesdays',
 			'minimum_age'	=>	'18 and over',
			'address_1'		=>	'880 N sdflkjsd',
			'address_2'		=>	'Suite 2',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA',
			'contact_email'	=>	'carax@gmail.com',
			'member_id'		=>	'24'
 		);

 		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData($dataVenue);

 		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataVenue['id'])->andReturn($venueModel)->once();
		$this->setLoggedInUserWithRole('admin');

 		$this->dispatch('/venues/review/'.$dataVenue['id']);
 		$this->assertNotRedirect();
 		$this->assertResponseStatusCode(200);

 		$resultVariables = $this->getResultVariables();
 		$venueModelResultvariables = $this->getResultVariables('venueModel');

		$this->assertArrayHasKey('url', $resultVariables);
 		$this->assertEquals($venueModel, $venueModelResultvariables);
	}

	public function testReviewActionNoVenueModelFoundUsingGetRequest() {
		$data = array(
			'id'	=>	'25'
		);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
 		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('Your venue cannot be located for review. Please fill out your venue information again.')->andReturnNull()->once();

 		$this->dispatch('/venues/review/'.$data['id']);
 		$this->assertRedirectTo('/venues/add');
 		$this->assertResponseStatusCode(302);
 	}

	public function testApproveActionUsingSession() {
		$data = array(
			'name'		=>	'Westie Wednesdays',
 			'address_1'	=>	'48 Westlake Ave',
		);

		$venueModel = $this->getMockSessionVenuesMapper()->createModelFromData($data);
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturn($venueModel)->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with('You have successfully added an venue to our site!')->andReturnNull()->once();
		$this->getMockVenuesMapper()->shouldReceive('insertModel')->with($venueModel)->andReturnNull()->once();
		$this->getMockSessionVenuesMapper()->shouldReceive('delete')->withNoArgs()->andReturnNull()->once();
		$this->getMockVenuesProcess()->shouldReceive('sendApprovalEmailToAdmin')->with($venueModel)->andReturnNull()->once();

		$this->dispatch('/venues/approve');
		$this->assertRedirectTo('/');
		$this->assertResponseStatusCode(302);
		$this->assertMatchedRouteName('venues/approve');
		$this->assertModuleName('Venues');
		$this->assertControllerClass('VenuesController');
		$this->assertActionName('approve');
	}

	public function testApproveActionNoVenueFound() {
		$this->getMockSessionVenuesMapper()->shouldReceive('fetchModel')->withNoArgs()->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('We cannot locate your venue for approval. Please fill out your venue information again.')->andReturnNull()->once();

		$this->dispatch('/venues/approve');
		$this->assertRedirectTo('/venues/add');
		$this->assertResponseStatusCode(302);
	}

	public function testApproveActionUsingGetRequest() {
		$data = array(
			'id'		=>	'34',
			'name'		=>	'Westie Wednesdays',
 			'address_1'	=>	'48 Westlake Ave',
			'member_id'	=>	'55'
		);

		$venueModel = $this->getMockVenuesMapper()->createModelFromData($data);
		$processResultSuccess = $this->getProcessResultSuccess($venueModel);
		$this->setLoggedInUserWithRole('admin');
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($venueModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('updateModel')->with($venueModel)->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("You have updated the venue: {$venueModel->name}.")->andReturnNull()->once();
		$this->getMockVenuesProcess()->shouldReceive('sendApprovalEmailToAdmin')->with($venueModel)->andReturn($processResultSuccess)->once();

		$this->dispatch('/venues/approve/'.$data['id']);
		$this->assertRedirectTo('/');
		$this->assertResponseStatusCode(302);
		$this->assertMatchedRouteName('venues/approve');
		$this->assertModuleName('Venues');
		$this->assertControllerClass('VenuesController');
		$this->assertActionName('approve');
	}

	public function testApproveActionNoVenueModelFoundUsingGetRequest() {
		$data = array(
			'id'		=>	'42',
			'member_id'	=>	'55'
		);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturnNull()->once();
 		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with('We cannot locate your venue for approval. Please fill out your venue information again.')->andReturnNull()->once();

		$this->setLoggedInUserWithRole();
 		$this->dispatch('/venues/approve/'.$data['id']);
 		$this->assertResponseStatusCode(302);
 		$this->assertRedirectTo('/venues/add');
 	}


	// ================================================================= FACTORY METHODS============================================================
	/**
	 * @return \Mockery\Mock|\Registration\Mapper\MembersMapper
	 */
	protected function getMockMembersMapper() {
		if (!isset($this->_mockMembersMapper)) $this->_mockMembersMapper = $this->getApplicationServiceLocator()->get('\Registration\Mapper\MembersMapper');
		return $this->_mockMembersMapper;
	}

	/**
	 * @return \Mockery\Mock|\Venues\Mapper\VenuesMapper
	 */
	private function getMockVenuesMapper() {
		if (!isset($this->_mockVenuesMapper)) $this->_mockVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_mockVenuesMapper;
	}

	/**
	 * @return \Mockery\Mock|\Venues\Mapper\SessionVenuesMapper
	 */
	private function getMockSessionVenuesMapper() {
		if (!isset($this->_mockSessionVenuesMapper)) $this->_mockSessionVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\SessionVenuesMapper');
		return $this->_mockSessionVenuesMapper;
	}

	/**
	 * @return \Mockery\Mock|\Venues\Process\VenuesProcess
	 */
	private function getMockVenuesProcess() {
		if (!isset($this->_mockVenuesProcess)) $this->_mockVenuesProcess = $this->getApplicationServiceLocator()->get('\Venues\Process\VenuesProcess');
		return $this->_mockVenuesProcess;
	}
}