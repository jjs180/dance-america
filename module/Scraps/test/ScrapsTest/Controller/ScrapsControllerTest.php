<?php
namespace ScrapsTest\Controller;

use Application\Constants\MessageConstants;
use Scraps\Constants\ScrapsStatusConstants;

class ScrapsControllerTest extends \NovumWare\Test\Controller\AbstractControllerTest
{
	public function testManageScrapsAction() {
		$data = array(
			'id'			=>	'25',
			'name'			=>	'Tutti Frutti Dance',
			'description'	=>	NULL
		);
		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($data);
		$expectedScrapModelsArray = [$scrapModel, $scrapModel, $scrapModel];
		$expectedScrapStatusArray = array(
			'unprocessed'			=>	ScrapsStatusConstants::UNPROCESSED,
			'partiallyProcessed'	=>	ScrapsStatusConstants::VENUE_ADDED_EVENTS_PARTIALLY_PROCESSED,
			'completeyProcessed'	=>	ScrapsStatusConstants::PROCESSING_COMPLETE,
			'archived'				=>	ScrapsStatusConstants::ARCHIVED
		);

		$this->getMockScrapsMapper()->shouldReceive('fetchManyUnarchived')->withNoArgs()->andReturn($expectedScrapModelsArray)->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('manage-scraps');
		$this->assertModuleName('Scraps');
		$this->assertControllerClass('ScrapsController');
		$this->assertActionName('manage-scraps');

		$scrapModelsArrayResultVariables = $this->getResultVariables('scrapModelsArray');
		$scrapStatusArrayResultVariables = $this->getResultVariables('scrapStatusArray');

		$this->assertEquals($expectedScrapModelsArray, $scrapModelsArrayResultVariables);
		$this->assertEquals($expectedScrapStatusArray, $scrapStatusArrayResultVariables);
	}

	public function testManageScrapsActionNoScrapsFound() {
		$this->getMockScrapsMapper()->shouldReceive('fetchManyUnarchived')->withNoArgs()->andReturn([])->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);

		$scrapModelsArrayResultVariables = $this->getResultVariables('scrapModelsArray');
		$this->assertEquals([], $scrapModelsArrayResultVariables);
	}

	public function testEditAction() {
		$data = array(
			'id'			=>	'25',
			'name'			=>	'Tutti Frutti Dance',
			'description'	=>	NULL
		);
		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($data);
		$processResult = $this->getProcessResultSuccess($scrapModel);
		$this->getMockScrapsProcess()->shouldReceive('checkForExistingVenue')->andReturn($processResult)->once();
		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($scrapModel)->once();
		$expectedScrapModelStatusConstantsArray = array(
			'venueAddedEventsUnprocessed'			=>	ScrapsStatusConstants::VENUE_ADDED_EVENTS_UNPROCESSED,
			'venueAddedEventsPartiallyProcessed'	=>	ScrapsStatusConstants::VENUE_ADDED_EVENTS_PARTIALLY_PROCESSED,
			'venueAddedEventsProcessed'				=>	ScrapsStatusConstants::PROCESSING_COMPLETE
		);

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/edit/'.$data['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('manage-scraps/edit');
		$this->assertModuleName('Scraps');
		$this->assertControllerClass('ScrapsController');
		$this->assertActionName('edit');

		$scrapModelResultVariables = $this->getResultVariables('scrapModel');
		$scrapModelStatusConstantsResultVariables = $this->getResultVariables('scrapModelStatusConstants');

		$this->assertEquals($scrapModel, $scrapModelResultVariables);
		$this->assertEquals($expectedScrapModelStatusConstantsArray, $scrapModelStatusConstantsResultVariables);
	}

	public function testEditActionNoScrapFound() {
		$dataScrap = array(
			'id'			=>	'25',
		);

		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($dataScrap['id'])->andReturnNull()->once();
		$this->setExpectedException('\Exception', "Entry: {$dataScrap['id']} could not be found.");

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/edit/'.$dataScrap['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testEditActionScrapIsAssociatedWithVenue() {
		$dataScrap = array(
			'id'			=>	'25',
			'name'			=>	'Tutti Frutti Dance',
			'description'	=>	NULL,
			'venue_id'		=>	'82'
		);
		$dataVenue = array(
			'id'	=>	$dataScrap['venue_id'],
			'name'	=>	'Tutti Frutti Studio'
		);
		$dataEvent = array(
			'id'		=>	'98',
			'name'		=>	$dataScrap['name'],
			'venue_id'	=>	$dataVenue['id']
		);

		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap); /*@var $scrapModel \Scraps\Model\ScrapModel */
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$processResultSuccess = $this->getProcessResultSuccess($scrapModel);
		$this->getMockScrapsProcess()->shouldReceive('checkForExistingVenue')->with($scrapModel)->andReturn($processResultSuccess)->once();
		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($dataScrap['id'])->andReturn($scrapModel)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataScrap['venue_id'])->andReturn($venueModel)->once();
		$this->getMockEventsMapper()->shouldReceive('fetchManyForVenueId')->with($dataVenue['id'])->andReturn([$eventModel, $eventModel, $eventModel])->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/edit/'.$dataScrap['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testEditActionAddVenue() {
		$dataScrap = array(
			'id'			=>	'25',
			'name'			=>	'Tutti Frutti Dance',
			'description'	=>	NULL,
		);
		$dataPost = array(
			'reformatScrapForm'	=> array(
				'venue_name'				=>	$dataScrap['name'],
				'venue_minimum_age'			=>	'18 and over',
				'venue_type'				=>	'Bar',
				'scrap_status'				=>	ScrapsStatusConstants::VENUE_ADDED_EVENTS_UNPROCESSED
			)
		);
		$dataVenue = array(
			'name'			=>	$dataPost['reformatScrapForm']['venue_name'],
			'minimum_age'	=>	$dataPost['reformatScrapForm']['venue_minimum_age'],
			'type'			=>	$dataPost['reformatScrapForm']['venue_type']
		);

		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$dataProcessResult = array(
			'venueModel'	=>	$venueModel,
			'scrapModel'	=>	$scrapModel
		);

		$processResultSuccess = $this->getProcessResultSuccess($dataProcessResult);
		$processResultSuccessNoVenue = $this->getProcessResultSuccess($scrapModel);
		$this->getMockScrapsProcess()->shouldReceive('checkForExistingVenue')->with($scrapModel)->andReturn($processResultSuccessNoVenue)->once();
		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($dataScrap['id'])->andReturn($scrapModel)->once();
		$this->getMockVenuesProcess()->shouldReceive('insertVenueFromScrapModelAndVenueData')->andReturn($processResultSuccess)->once();
		$this->getMockScrapsMapper()->shouldReceive('updateModel')->with($this->compareModel($scrapModel))->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("You have successfully added the venue: {$venueModel->name} to the site.")->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/edit/'.$dataScrap['id'], 'POST', $dataPost);
		$this->assertRedirectTo('/manage-scraps');
		$this->assertResponseStatusCode(302);
	}

	public function testEditActionAddVenueFailure() {
		$dataScrap = array(
			'id'			=>	'25',
			'name'			=>	'Tutti Frutti Dance',
			'description'	=>	NULL,
			'latitude'		=>	'34.0575300',
			'longitude'		=>	'-118.2366510'
		);
		$dataPost = array(
			'reformatScrapForm'	=> array(
				'venue_name'				=>	$dataScrap['name'],
				'venue_minimum_age'			=>	'18 and over',
				'venue_type'				=>	'Bar',
				'scrap_status'				=>	ScrapsStatusConstants::VENUE_ADDED_EVENTS_UNPROCESSED
			)
		);
		$dataVenue = array(
			'name'			=>	$dataPost['reformatScrapForm']['venue_name'],
			'minimum_age'	=>	$dataPost['reformatScrapForm']['venue_minimum_age'],
			'type'			=>	$dataPost['reformatScrapForm']['venue_type'],
			'web_link'		=>	null,
			'description'	=>	null,
			'special_notes'	=>	null
		);

		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap);
		$processResultFailure = $this->getProcessResultFailure("There was an error converting the latitude and longitude to an address.");
		$processResultSuccess = $this->getProcessResultSuccess($scrapModel);
		$this->getMockScrapsProcess()->shouldReceive('checkForExistingVenue')->with($scrapModel)->andReturn($processResultSuccess)->once();
		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($dataScrap['id'])->andReturn($scrapModel)->once();
		$this->getMockVenuesProcess()->shouldReceive('insertVenueFromScrapModelAndVenueData')->with($this->compareModel($scrapModel), $this->compareArray($dataVenue))->andReturn($processResultFailure)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with($processResultFailure->message)->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/edit/'.$dataScrap['id'], 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);

		$this->assertEquals($scrapModel, $this->getResultVariables('scrapModel'));
	}

	public function testEditActionPostValid() {
		$dataScrap = array(
			'id'			=>	'25',
			'name'			=>	'Tutti Frutti Dance',
			'description'	=>	NULL,
			'venue_id'		=>	'82'
		);
		$dataPost = array(
			'reformatScrapForm'	=> array(
				'venue_id'					=>	$dataScrap['venue_id'],
				'venue_name'				=>	$dataScrap['name'],
				'venue_minimum_age'			=>	'18 and over',
				'venue_type'				=>	'Bar',
				'event_name'				=>	$dataScrap['name'],
				'event_minimum_age'			=>	'None',
				'event_start_time'			=>	'01%3A00',
				'event_end_time'			=>	'13%3A00',
				'event_start_date'			=>	'2014-01-01',
				'event_end_date'			=>	'2014-01-01',
				'event_monthly_frequency'	=>	'1',
				'scrap_status'				=>	ScrapsStatusConstants::VENUE_ADDED_EVENTS_UNPROCESSED
			)
		);
		$dataVenue = array(
			'id'			=>	$dataPost['reformatScrapForm']['venue_id'],
			'name'			=>	$dataPost['reformatScrapForm']['venue_name'],
			'minimum_age'	=>	$dataPost['reformatScrapForm']['venue_minimum_age'],
			'type'			=>	$dataPost['reformatScrapForm']['venue_type']
		);
		$dataEvent = array(
			'name'				=>	$dataPost['reformatScrapForm']['event_name'],
			'venue_id'			=>	$dataVenue['id'],
			'minimum_age'		=>	$dataPost['reformatScrapForm']['event_minimum_age'],
			'start_time'		=>	$dataPost['reformatScrapForm']['event_start_time'],
			'end_time'			=>	$dataPost['reformatScrapForm']['event_end_time'],
			'start_date'		=>	$dataPost['reformatScrapForm']['event_start_date'],
			'end_date'			=>	$dataPost['reformatScrapForm']['event_end_date'],
			'monthly_frequency'	=>	$dataPost['reformatScrapForm']['event_monthly_frequency']
		);

		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);

		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($dataScrap['id'])->andReturn($scrapModel)->once();
		$processResultSuccess = $this->getProcessResultSuccess($scrapModel);
		$this->getMockScrapsProcess()->shouldReceive('checkForExistingVenue')->with($scrapModel)->andReturn($processResultSuccess)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataVenue['id'])->andReturn($venueModel)->once();
		$this->getMockEventsMapper()->shouldReceive('insertModel')->with($this->compareModel($eventModel))->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("You have successfully added the event: {$eventModel->name} to the site.")->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("You have successfully added the venue: {$venueModel->name} to the site.");
		$this->getMockScrapsMapper()->shouldReceive('updateModel')->with($scrapModel)->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/edit/'.$dataScrap['id'], 'POST', $dataPost);
		$this->assertRedirectTo('/manage-scraps');
		$this->assertResponseStatusCode(302);
	}

	public function testEditActionPostInvalid() {
		$dataScrap = array(
			'id'			=>	'25',
			'name'			=>	'Tutti Frutti Dance',
			'description'	=>	NULL,
		);
		$dataPost = array(
			'reformatScrapForm'	=> array(
				'venue_minimum_age'			=>	'18 and over',
				'venue_type'				=>	'Bar'
			)
		);
		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap);

		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($dataScrap['id'])->andReturn($scrapModel)->once();
		$processResultSuccess = $this->getProcessResultSuccess($scrapModel);
		$this->getMockScrapsProcess()->shouldReceive('checkForExistingVenue')->with($scrapModel)->andReturn($processResultSuccess)->once();
		$this->mockFlashMessenger->shouldReceive('addErrorMessage')->with(MessageConstants::ERROR_INVALID_FORM)->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/edit/'.$dataScrap['id'], 'POST', $dataPost);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testArchiveAction() {
		$dataScrap = array(
			'id'	=>	'25',
			'name'	=>	'Wed Night Meet up'
		);

		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap);
		$scrapModel->status = ScrapsStatusConstants::ARCHIVED;
		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($dataScrap['id'])->andReturn($scrapModel)->once();
		$this->getMockScrapsMapper()->shouldReceive('updateModel')->with($this->compareModel($scrapModel))->andReturnNull()->once();
		$this->mockFlashMessenger->shouldReceive('addSuccessMessage')->with("Your entry has been archived")->andReturnNull()->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/archive/'.$dataScrap['id']);
		$this->assertRedirectTo('/manage-scraps');
		$this->assertResponseStatusCode(302);
		$this->assertMatchedRouteName('manage-scraps/archive');
		$this->assertModuleName('Scraps');
		$this->assertControllerClass('ScrapsController');
		$this->assertActionName('archive');
	}

	public function testArchiveActionNoneFound() {
		$dataScrap = array(
			'id'	=>	'25',
			'name'	=>	'Wed Night Meet up'
		);
		$this->getMockScrapsMapper()->shouldReceive('fetchOneForId')->with($dataScrap['id'])->andReturnNull()->once();
		$this->setExpectedException('\Exception', "Entry: {$dataScrap['id']} could not be found.");

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/manage-scraps/archive/'.$dataScrap['id']);
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testArchivedScrapsAction() {
		$dataScrap = array(
			'id'	=>	'25',
			'name'	=>	'Wed Night Meet up'
		);

		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap);
		$expectedScrapModelsArray = [$scrapModel, $scrapModel, $scrapModel];
		$this->getMockScrapsMapper()->shouldReceive('fetchManyArchived')->withNoArgs()->andReturn($expectedScrapModelsArray)->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/archived-scraps');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('archived-scraps');
		$this->assertModuleName('Scraps');
		$this->assertControllerClass('ScrapsController');
		$this->assertActionName('archived-scraps');

		$returnedScrapModelsArray = $this->getResultVariables('scrapModelsArray');
		$this->assertEquals($expectedScrapModelsArray, $returnedScrapModelsArray);
	}

	public function testArchivedScrapsActionNoneFound() {
		$this->getMockScrapsMapper()->shouldReceive('fetchManyArchived')->withNoArgs()->andReturn([])->once();

		$this->setLoggedInUserWithRole('admin');
		$this->dispatch('/archived-scraps');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);

		$returnedScrapModelsArray = $this->getResultVariables('scrapModelsArray');
		$this->assertEquals([], $returnedScrapModelsArray);
	}


	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	* @return \Mockery\Mock|\Scraps\Mapper\ScrapsMapper
	*/
 	protected function getMockScrapsMapper() {
 		if (!isset($this->_mockScrapsMapper)) $this->_mockScrapsMapper = $this->getApplicationServiceLocator()->get('\Scraps\Mapper\ScrapsMapper');
 		return $this->_mockScrapsMapper;
 	}

	/**
	* @return \Mockery\Mock|\Events\Mapper\EventsMapper
	*/
	protected function getMockEventsMapper() {
 		if (!isset($this->_mockEventsMapper)) $this->_mockEventsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\EventsMapper');
 		return $this->_mockEventsMapper;
 	}

	/**
	* @return \Mockery\Mock|\Venues\Mapper\VenuesMapper
	*/
	protected function getMockVenuesMapper() {
 		if (!isset($this->_mockVenuesMapper)) $this->_mockVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\VenuesMapper');
 		return $this->_mockVenuesMapper;
 	}

	/**
	 * @return \Mockery\Mock|\Venues\Process\VenuesProcess
	 */
	private function getMockVenuesProcess() {
		if (!isset($this->_mockVenuesProcess)) $this->_mockVenuesProcess = $this->getApplicationServiceLocator()->get('\Venues\Process\VenuesProcess');
		return $this->_mockVenuesProcess;
	}

	/**
	 * @return \Mockery\Mock|\Scraps\Process\ScrapsProcess
	 */
	private function getMockScrapsProcess() {
		if (!isset($this->_mockScrapsProcess)) $this->_mockScrapsProcess = $this->getApplicationServiceLocator()->get('\Scraps\Process\ScrapsProcess');
		return $this->_mockScrapsProcess;
	}
}