<?php
namespace ApplicationTest\Controller;

class IndexControllerTest extends \NovumWare\Test\Controller\AbstractControllerTest
{

	public function testIndexAction() {
		$dataVenue = array(
			'id'	=>	'233',
			'name'	=>	'Example Venue Name'
		);

		$dataEvent = array(
			'id'		=>	'23',
			'name'		=>	'Example Event Name',
			'venue_id'	=>	$dataVenue['id']
		);

		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);

		$this->getMockEventsMapper()->shouldReceive('fetchAll')->withNoArgs()->andReturn([$eventModel, $eventModel, $eventModel])->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchAll')->withNoArgs()->andReturn([$venueModel, $venueModel, $venueModel])->once();
		$this->getMockCostsMapper()->shouldReceive('fetchManyForEventId')->andReturn([])->once();
		$this->getMockRepetitionsMapper()->shouldReceive('fetchManyForEventId')->andReturn([])->times(3);
		$this->getMockCostsMapper()->shouldReceive('fetchManyForEventId')->andReturn([])->times(2);
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->with($dataEvent['venue_id'])->andReturn($venueModel)->times(1);

		$this->dispatch('/');
		$this->assertModuleName('Application');
		$this->assertControllerClass('IndexController');
		$this->assertActionName('index');
		$this->assertMatchedRouteName('home');
		$this->assertResponseStatusCode(200);

		$eventModelsArrayResultVariables = $this->getResultVariables('eventModelsArray');
		$venueModelsArrayResultVariables = $this->getResultVariables('venueModelsArray');

		$this->assertEquals([$eventModel, $eventModel, $eventModel], $eventModelsArrayResultVariables);
		$this->assertEquals([$venueModel, $venueModel, $venueModel], $venueModelsArrayResultVariables);
	}

	public function testAboutAction() {
		$this->dispatch('/about');
		$this->assertModuleName('Application');
		$this->assertControllerClass('IndexController');
		$this->assertActionName('about');
		$this->assertMatchedRouteName('about');
		$this->assertResponseStatusCode(200);
	}

	public function testContactAction() {
		$this->dispatch('/contact');
		$this->assertModuleName('Application');
		$this->assertControllerClass('IndexController');
		$this->assertActionName('contact');
		$this->assertMatchedRouteName('contact');
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

}