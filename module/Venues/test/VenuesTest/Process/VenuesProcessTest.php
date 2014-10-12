<?php
namespace VenuesTest\Process;

use NovumWare\Process\AbstractProcessFactory;

class VenuesProcessTest extends \NovumWare\Test\Process\AbstractProcessTest
{
	/** @var \Mockery\Mock|\NovumWare\Test\Process\MockProcess|\Venues\Process\VenuesProcess */
	protected $venuesProcess;


	public function setUp() {
		parent::setUp();
		$processFactory = new AbstractProcessFactory;
		$this->venuesProcess = $processFactory->createServiceWithName($this->getApplicationServiceLocator(), 'venuesprocessvenuesprocess', '\Venues\Process\VenuesProcess');
	}

	public function testConvertLatLongToAddress() {
		$data = array(
			'latitude'	=>	'34.0575300',
			'longitude'	=>	'-118.2366510'
		);
		$addressArray = array(
			'address_1'		=>	'880 North Alameda Street',
			'address_2'		=>	'',
			'city'			=>	'Los Angeles',
			'state'			=>	'CA',
			'postal_code'	=>	'90012',
			'country'		=>	'USA',
		);
		$expectedProcessResults = $this->getProcessResultSuccess($addressArray);
		$returnedProcessResults = $this->venuesProcess->convertLatLongToAddress($data['latitude'], $data['longitude']); /*@var $returnedProcessResults \NovumWare\Process\ProcessResult */
		$this->assertEquals($expectedProcessResults, $returnedProcessResults);
	}

	public function testConvertLatLongToAddressStatusNotOk() {
		$data = array(
			'latitude'	=>	'34.0575300',
			'longitude'	=>	''
		);
		$expectedProcessResults = $this->getProcessResultFailure("There was an error converting the latitude and longitude to an address.");
		$returnedProcessResults = $this->venuesProcess->convertLatLongToAddress($data['latitude'], $data['longitude']);
		$this->assertEquals($expectedProcessResults, $returnedProcessResults);
	}

	public function testInsertVenueFromScrapModelAndVenueData() {
		$dataPost = array(
			'name'	=>	'example',
			'type'	=>	'Bar'
		);
		$dataScrap = array(
			'id'			=>	'28',
			'name'			=>	'gobble',
			'description'	=>	'Bailando mucho!',
			'latitude'		=>	'34.0575300',
			'longitude'		=>	'-118.2366510'
		);
		$dataVenue = array(
			'name'	=>	$dataPost['name'],
			'type'	=>	$dataPost['type']
		);

		$scrapModel = $this->getMockScrapsMapper()->createModelFromData($dataScrap);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$data = array(
			'scrapModel'	=>	$scrapModel,
			'venueModel'	=>	$venueModel
		);
		$addressArray = $this->venuesProcess->convertLatLongToAddress($scrapModel->latitude, $scrapModel->longitude)->data;
		$venueModel->setProperties($addressArray);

		$this->getMockVenuesMapper()->shouldReceive('insertModel')->with($this->compareModel($venueModel))->andReturnNull()->once();

		$expectedProcessResults = $this->getProcessResultSuccess($data);
		$returnedProcessResults = $this->venuesProcess->insertVenueFromScrapModelAndVenueData($scrapModel, $dataPost);

		$this->assertEquals($expectedProcessResults, $returnedProcessResults);
	}

	public function testSendApprovalEmailToAdmin() {
		$dataVenue = array(
			'id'	=>	'25',
			'name'	=>	'Charlie Night Social'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$adminMemberModel = $this->getMockMembersMapper()->createModelFromData();
		$adminMemberModel->role = 'admin';

		$this->getMockMembersMapper()->shouldReceive('fetchOneForAdminPrivileges')->withNoArgs()->andReturn($adminMemberModel)->once();
		$this->getMockEmailsProcess()->shouldReceive('sendEmailFromTemplate')->andReturnNull()->once();

		$venueModelProcessResult = $this->venuesProcess->sendApprovalEmailToAdmin($venueModel);
		$this->assertEquals($this->getProcessResultSuccess(), $venueModelProcessResult);
	}

	public function testSendApprovalEmailToAdminNoAdminFound() {
		$dataVenue = array(
			'id'	=>	'25',
			'name'	=>	'Charlie Night Social'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);

		$this->getMockMembersMapper()->shouldReceive('fetchOneForAdminPrivileges')->withNoArgs()->andReturnNull()->once();
		$processResult = $this->venuesProcess->sendApprovalEmailToAdmin($venueModel);
		$this->assertEquals($this->getProcessResultFailure('No administrator on file'), $processResult);
	}

	public function testSetVenuePropertiesFromForm () {
		$dataVenue = array(
			'id'		=>	'44',
			'name'		=>	'Black Palace',
			'address_1'	=>	'2229 N Ave West'
		);
		$dataForm = array(
			'name'			=>	'Wordens',
			'address_1'		=>	'2226 N Ave West',
			'address_2'		=>	'',
			'city'			=>	'Missoula',
			'state'			=>	'MT',
			'postal_code'	=>	'59801',
			'country'		=>	'United State of America',
			'url'			=>	array(
				0 => 'http://www.wesite.com',
				1 => 'http://www.westie-site.com'
			)
		);

		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue); /*@var $venueModel \Venues\Model\VenueModel */
		$updatedVenueModel = $venueModel;
		$updatedVenueModel->setProperties($dataForm);
		$updatedVenueModel->latitude = '46.852773';
		$updatedVenueModel->longitude = '-114.033488';

		$returnedProcessResults = $this->venuesProcess->setVenuePropertiesFromForm($venueModel, $dataForm);
		$this->assertEquals($this->getProcessResultSuccess($updatedVenueModel), $returnedProcessResults);
	}

	public function testSetVenuePropertiesFromFormProcessResultFailure () {
		$dataVenue = array(
			'id'		=>	'44',
			'name'		=>	'Black Palace',
			'address_1'	=>	'2229 N Ave West'
		);
		$dataForm = array(
			'name'			=>	'Wordens',
			'address_1'		=>	'',
			'address_2'		=>	'',
			'city'			=>	'',
			'state'			=>	'',
			'postal_code'	=>	'',
			'country'		=>	'',
			'url'			=>	array()
		);

		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue); /*@var $venueModel \Venues\Model\VenueModel */

		$returnedProcessResults = $this->venuesProcess->setVenuePropertiesFromForm($venueModel, $dataForm);
		$this->assertEquals($this->getProcessResultFailure('There was an error with this address. Please try again.'), $returnedProcessResults);
	}



	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Mockery\Mock|\Registration\Mapper\MembersMapper
	 */
	private function getMockMembersMapper() {
		if (!isset($this->_mockMembersMapper)) $this->_mockMembersMapper = $this->getApplicationServiceLocator()->get('\Registration\Mapper\MembersMapper');
		return $this->_mockMembersMapper;
	}

	/**
	 * @return \Mockery\Mock|\Scraps\Mapper\ScrapsMapper
	 */
	private function getMockScrapsMapper() {
		if(!isset($this->_mockScrapsMapper)) $this->_mockScrapsMapper = $this->getApplicationServiceLocator()->get('\Scraps\Mapper\ScrapsMapper');
		return $this->_mockScrapsMapper;
	}

	/**
	 * @return \Mockery\Mock|\Venues\Mapper\VenuesMapper
	 */
	private function getMockVenuesMapper() {
		if (!isset($this->_mockVenuesMapper)) $this->_mockVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_mockVenuesMapper;
	}


}