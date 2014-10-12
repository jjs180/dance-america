<?php
namespace VenuesTest\Mapper;

use NovumWare\Db\Table\Mapper\AbstractMapperFactory;

class VenuesMapperTest extends \NovumWare\Test\Db\Table\Mapper\AbstractMapperTest
{
	/** @var \NovumWare\Test\Db\Table\Mapper\MockMapper|\Venues\Mapper\VenuesMapper */
	protected $venuesMapper;

	public function setUp() {
		parent::setUp();
		$mapperFactory = new AbstractMapperFactory;
		$this->venuesMapper = $mapperFactory->createServiceWithName($this->getApplicationServiceLocator(), 'venuesmappervenuesmapper', '\Venues\Mapper\VenuesMapper');
		$this->venuesMapper->setTableGateway($this->getApplicationServiceLocator()->get('MockTableGateway'));
	}


	// ========================================================================= CONVENIENCE METHODS =========================================================================
	public function testFetchManyForMemberId() {
		$data = array(
			'id'	=> '23'
		);
		$expectedModel = $this->venuesMapper->createModelFromData($data); /*@var $expectedModel \Venues\Model\VenueModel */

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where(['venue_member_id=?' => $data['id']]);
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'venue_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForMemberId($data['id']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForMemberIdNoneFound() {
		$data = array(
			'id'	=> '23'
		);
		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where(['venue_member_id=?' => $data['id']]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForMemberId($data['id']);
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyForContactEmail() {
		$data = array(
			'email'	=> 'example@gmail.com'
		);
		$expectedModel = $this->venuesMapper->createModelFromData($data); /*@var $expectedModel \Venues\Model\VenueModel */

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_contact_email', "%{$data['email']}%");
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'venue_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForContactEmail($data['email']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForContactEmailNoneFound() {
		$data = array(
			'email'	=> 'example@gmail.com'
		);
		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_contact_email', "%{$data['email']}%");
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForContactEmail($data['email']);
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyForName() {
		$data = array(
			'name'	=> 'West Coast Wednesdays'
		);
		$expectedModel = $this->venuesMapper->createModelFromData($data); /*@var $expectedModel \Venues\Model\VenueModel */

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_name', "%{$data['name']}%");
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'venue_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForName($data['name']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForNameNoneFound() {
		$data = array(
			'name'	=> 'West Coast Wednesdays'
		);

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_name', "%{$data['name']}%");
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForName($data['name']);
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyForCity() {
		$data = array(
			'city'	=> 'Los Angeles'
		);
		$expectedModel = $this->venuesMapper->createModelFromData($data); /*@var $expectedModel \Venues\Model\VenueModel */

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_city', "%{$data['city']}%");
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'venue_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForCity($data['city']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForCityNoneFound() {
		$data = array(
			'city'	=> 'Los Angeles'
		);

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_city', "%{$data['city']}%");
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForCity($data['city']);
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyForState() {
		$data = array(
			'state'	=> 'CA'
		);
		$expectedModel = $this->venuesMapper->createModelFromData($data); /*@var $expectedModel \Venues\Model\VenueModel */

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_state', "%{$data['state']}%");
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'venue_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForState($data['state']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForStateNoneFound() {
		$data = array(
			'state'	=> 'CA'
		);

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_state', "%{$data['state']}%");
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForState($data['state']);
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyForPostalCode() {
		$data = array(
			'postal_code'	=> 'USA'
		);
		$expectedModel = $this->venuesMapper->createModelFromData($data); /*@var $expectedModel \Venues\Model\VenueModel */

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where(['venue_postal_code=?' => $data['postal_code']]);
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'venue_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForPostalCode($data['postal_code']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForPostalCodeNoneFound() {
		$data = array(
			'postal_code'	=> 'USA'
		);

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where(['venue_postal_code=?' => $data['postal_code']]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForPostalCode($data['postal_code']);
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyForCountry() {
		$data = array(
			'country'	=> 'USA'
		);
		$expectedModel = $this->venuesMapper->createModelFromData($data); /*@var $expectedModel \Venues\Model\VenueModel */

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_country', "%{$data['country']}%");
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'venue_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForCountry($data['country']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForCountryNoneFound() {
		$data = array(
			'country'	=> 'USA'
		);

		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where->like('venue_country', "%{$data['country']}%");
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->venuesMapper->fetchManyForCountry($data['country']);
		$this->assertEquals([], $returnedModelsArray);
	}

//	public function testFetchOneForLatitudeLongitude() {
//		$data = array(
//			'latitude'	=>	'46.887633',
//			'longitude'	=>	'-113.967075'
//		);
//		$addressArray = array(
//			'address_1'		=>	'2530 Gilbert Ave',
//			'address_2'		=>	'',
//			'city'			=>	'Missoula',
//			'state'			=>	'MT',
//			'postal_code'	=>	'59801',
//			'country'		=>	'USA'
//		);
//		$expectedModel = $this->venuesMapper->createModelFromData($addressArray); /*@var $expectedModel \Venues\Model\VenueModel */
//
//		$expectedSelect = $this->getSelect('venues');
//		$expectedSelect->where(array(
//			'venue_address_1'		=>	$addressArray['address_1'],
//			'venue_address_2'		=>	$addressArray['address_2'],
//			'venue_city'		 	=>	$addressArray['city'],
//			'venue_state'			=>	$addressArray['state'],
//			'venue_postal_code'		=>	$addressArray['postal_code'],
//			'venue_country'			=>	$addressArray['country']
//		));
//		$resultSet = $this->createResultSetFromDataWithPrefix($addressArray, 'venue_');
//		$processResultSuccess = $this->getProcessResultSuccess($addressArray);
//		$this->getMockVenuesProcess()->shouldReceive('convertLatLongToAddress')->with([$data['latitude'], $data['longitude']])->andReturn($processResultSuccess)->once();
//		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
//		$returnedModel = $this->venuesMapper->fetchOneForLongitudeLatitude($data['longitude'], $data['latitude']);
//		$this->assertEquals($expectedModel, $returnedModel);
//	}
//
//	public function testFetchOneForLatitudeLongitudeNoneFound() {
//		$data = array(
//			'latitude'	=>	'46.887633',
//			'longitude'	=>	'-113.967075'
//		);
//		$addressArray = array(
//			'address_1'		=>	'2530 Gilbert Ave',
//			'address_2'		=>	'',
//			'city'			=>	'Missoula',
//			'state'			=>	'MT',
//			'postal_code'	=>	'59801',
//			'country'		=>	'USA'
//		);
//
//		$expectedSelect = $this->getSelect('venues');
//		$expectedSelect->where(array(
//			'venue_address_1'		=>	$addressArray['address_1'],
//			'venue_address_2'		=>	$addressArray['address_2'],
//			'venue_city'		 	=>	$addressArray['city'],
//			'venue_state'			=>	$addressArray['state'],
//			'venue_postal_code'		=>	$addressArray['postal_code'],
//			'venue_country'			=>	$addressArray['country']
//		));
//		$resultSet = $this->createEmptyResultSet();
//		$processResultSuccess = $this->getProcessResultSuccess($addressArray);
//		$this->getMockVenuesProcess()->shouldReceive('convertLatLongToAddress')->with($this->compareArray([$data['latitude'], $data['longitude']]))->andReturn($processResultSuccess)->once();
//		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
//		$returnedModel = $this->venuesMapper->fetchOneForLongitudeLatitude($data['longitude'], $data['latitude']);
//		$this->assertEquals(null, $returnedModel);
//	}

	public function testFetchOneForAddress() {
		$addressArray = array(
			'address_1'		=>	'2530 Gilbert Ave',
			'address_2'		=>	'',
			'city'			=>	'Missoula',
			'state'			=>	'MT',
			'postal_code'	=>	'59801',
			'country'		=>	'USA'
		);
		$expectedModel = $this->venuesMapper->createModelFromData($addressArray);
		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where(array(
			'venue_address_1'		=>	$addressArray['address_1'],
			'venue_city'		 	=>	$addressArray['city'],
			'venue_state'			=>	$addressArray['state'],
			'venue_postal_code'		=>	$addressArray['postal_code'],
			'venue_country'			=>	$addressArray['country']
		));
		$resultSet = $this->createResultSetFromDataWithPrefix($addressArray, 'venue_');
		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
		$returnedModel = $this->venuesMapper->fetchOneForAddress($addressArray);
		$this->assertEquals($expectedModel, $returnedModel);
	}

	public function testFetchOneForAddressNoneFound() {
		$addressArray = array(
			'address_1'		=>	'2530 Gilbert Ave',
			'address_2'		=>	'',
			'city'			=>	'Missoula',
			'state'			=>	'MT',
			'postal_code'	=>	'59801',
			'country'		=>	'USA'
		);
		$expectedSelect = $this->getSelect('venues');
		$expectedSelect->where(array(
			'venue_address_1'		=>	$addressArray['address_1'],
			'venue_city'		 	=>	$addressArray['city'],
			'venue_state'			=>	$addressArray['state'],
			'venue_postal_code'		=>	$addressArray['postal_code'],
			'venue_country'			=>	$addressArray['country']
		));
		$resultSet = $this->createEmptyResultSet();
		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
		$returnedModel = $this->venuesMapper->fetchOneForAddress($addressArray);
		$this->assertEquals(null, $returnedModel);
	}
}