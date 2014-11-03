<?php
namespace PeopleTest\Mapper;

use NovumWare\Db\Table\Mapper\AbstractMapperFactory;

class PeopleMapperTest extends \NovumWare\Test\Db\Table\Mapper\AbstractMapperTest
{
	/** @var \NovumWare\Test\Db\Table\Mapper\MockMapper|\People\Mapper\PeopleMapper */
	protected $peopleMapper;

	public function setUp() {
		parent::setUp();
		$mapperFactory = new AbstractMapperFactory;
		$this->peopleMapper = $mapperFactory->createServiceWithName($this->getApplicationServiceLocator(), 'peoplemapperpeoplemapper', '\People\Mapper\PeopleMapper');
		$this->peopleMapper->setTableGateway($this->getApplicationServiceLocator()->get('MockTableGateway'));
	}


	// ========================================================================= CONVENIENCE METHODS =========================================================================
	public function testFetchManyForVenueId() {
		$data = array(
			'id'		=>	'45',
			'venue_id'	=> '34'
		);

		$expectedSelect = $this->getSelect('people');
		$expectedSelect->where(['person_venue_id=?'=>$data['venue_id']]);
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'person_');
		$expectedModel = $this->peopleMapper->createModelFromData($data);

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelArray = $this->peopleMapper->fetchManyForVenueId($data['venue_id']);
		$this->assertEquals([$expectedModel], $returnedModelArray);
	}

	public function testFetchManyForVenueIdNoneFound() {
		$data = array(
			'id'		=>	'45',
			'venue_id'	=> '34'
		);

		$expectedSelect = $this->getSelect('people');
		$expectedSelect->where(['person_venue_id=?'=>$data['venue_id']]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelArray = $this->peopleMapper->fetchManyForVenueId($data['venue_id']);
		$this->assertEquals([], $returnedModelArray);
	}

	public function testFetchManyForMemberId() {
		$data = array(
			'id'	=> '23'
		);
		$expectedModel = $this->peopleMapper->createModelFromData($data); /*@var $expectedModel \People\Model\EventModel */

		$expectedSelect = $this->getSelect('people');
		$expectedSelect->where(['person_member_id=?' => $data['id']]);
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'person_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->peopleMapper->fetchManyForMemberId($data['id']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForMemberIdNoneFound() {
		$data = array(
			'id'	=> '23'
		);
		$expectedSelect = $this->getSelect('people');
		$expectedSelect->where(['person_member_id=?' => $data['id']]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->peopleMapper->fetchManyForMemberId($data['id']);
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyForContactEmail() {
		$data = array(
			'email'	=> 'example@gmail.com'
		);
		$expectedModel = $this->peopleMapper->createModelFromData($data); /*@var $expectedModel \People\Model\EventModel */

		$expectedSelect = $this->getSelect('people');
		$expectedSelect->where->like('person_contact_email', "%{$data['email']}%");
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'person_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->peopleMapper->fetchManyForContactEmail($data['email']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForContactEmailNoneFound() {
		$data = array(
			'email'	=> 'example@gmail.com'
		);
		$expectedSelect = $this->getSelect('people');
		$expectedSelect->where->like('person_contact_email', "%{$data['email']}%");
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->peopleMapper->fetchManyForContactEmail($data['email']);
		$this->assertEquals([], $returnedModelsArray);
	}
}