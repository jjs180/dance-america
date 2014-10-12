<?php
namespace ScrapsTest\Process;

use NovumWare\Process\AbstractProcessFactory;

class ScrapsProcessTest extends \NovumWare\Test\Process\AbstractProcessTest
{
	/** @var \Mockery\Mock|\NovumWare\Test\Process\MockProcess|\Scraps\Process\ScrapsProcess */
	protected $scrapsProcess;


	public function setUp() {
		parent::setUp();
		$processFactory = new AbstractProcessFactory;
		$this->scrapsProcess = $processFactory->createServiceWithName($this->getApplicationServiceLocator(), 'scrapsProcessscrapsProcess', '\Scraps\Process\ScrapsProcess');
	}

	public function testCheckForExistingVenue() {
		$data = array(
			'id'		=>	'25',
			'latitude'	=>	'34.0575300',
			'longitude'	=>	'-118.2366510'
		);
		$addressArray = array(
			'address_1'		=>	'880 N Alameda St',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA'
		);
		$processResultSuccess = $this->getProcessResultSuccess($addressArray);
		$this->getMockVenuesProcess()->shouldReceive('convertLatLongToAddress')->with($data['latitude'], $data['longitude'])->andReturn($processResultSuccess)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForAddress')->with($addressArray)->andReturnNull()->once();
		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($data);

		$expectedProcessResult = $this->getProcessResultSuccess($scrapModel);
		$resultantProcessResult = $this->getMockScrapsProcess()->checkForExistingVenue($scrapModel);
		$this->assertEquals($expectedProcessResult, $resultantProcessResult);
	}

	public function testCheckForExistingVenueVenueFound() {
		$dataVenue = array(
			'id'	=>	'28',
			'name'	=>	'Google'
		);
		$dataScrap = array(
			'id'		=>	'25',
			'latitude'	=>	'34.0575300',
			'longitude'	=>	'-118.2366510',
			'venue_id'	=>	$dataVenue['id']
		);
		$addressArray = array(
			'address_1'		=>	'880 N Alameda St',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA'
		);
		$processResultSuccess = $this->getProcessResultSuccess($addressArray);
		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$this->getMockVenuesProcess()->shouldReceive('convertLatLongToAddress')->with($dataScrap['latitude'], $dataScrap['longitude'])->andReturn($processResultSuccess)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForAddress')->with($addressArray)->andReturn($venueModel)->once();
		$this->getMockScrapsMapper()->shouldReceive('updateModel')->with($scrapModel)->andReturnNull()->once();

		$expectedProcessResult = $this->getProcessResultSuccess($scrapModel);
		$resultantProcessResult = $this->getMockScrapsProcess()->checkForExistingVenue($scrapModel);
		$this->assertEquals($expectedProcessResult, $resultantProcessResult);
	}

	public function testCheckForExistingVenueProcessFailure() {
		$data = array(
			'id'		=>	'25',
			'latitude'	=>	'34.0575300',
			'longitude'	=>	'-118.2366510'
		);
		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($data);
		$processResultFailure = $this->getProcessResultFailure('There was an error converting the latitude and longitude to an address.');
		$this->getMockVenuesProcess()->shouldReceive('convertLatLongToAddress')->with($data['latitude'], $data['longitude'])->andReturn($processResultFailure)->once();

		$resultantProcessResult = $this->getMockScrapsProcess()->checkForExistingVenue($scrapModel);
		$this->assertEquals($processResultFailure, $resultantProcessResult);
	}


	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Mockery\Mock|\Scraps\Process\ScrapsProcess
	 */
	private function getMockScrapsProcess() {
		if (!isset($this->scrapsProcess)) $this->scrapsProcess = $this->getApplicationServiceLocator()->get('\Scraps\Process\ScrapsProcess');
		return $this->scrapsProcess;
	}

	/**
	 * @return \Mockery\Mock|\Scraps\Mapper\ScrapsMapper
	 */
	private function getMockScrapsMapper() {
		if(!isset($this->scrapsMapper)) $this->scrapsMapper = $this->getApplicationServiceLocator()->get('\Scraps\Mapper\ScrapsMapper');
		return $this->scrapsMapper;
	}

	/**
	 * @return \Mockery\Mock|\Venues\Mapper\VenuesMapper
	 */
	private function getMockVenuesMapper() {
		if (!isset($this->mockVenuesMapper)) $this->mockVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->mockVenuesMapper;
	}

	/**
	 * @return \Mockery\Mock|\Venues\Process\VenuesProcess
	 */
	private function getMockVenuesProcess() {
		if (!isset($this->mockVenuesProcess)) $this->mockVenuesProcess = $this->getApplicationServiceLocator()->get('\Venues\Process\VenuesProcess');
		return $this->mockVenuesProcess;
	}
}