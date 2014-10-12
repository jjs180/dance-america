<?php
namespace EventsTest\Mapper;

use NovumWare\Db\Table\Mapper\AbstractMapperFactory;

class EventsMapperTest extends \NovumWare\Test\Db\Table\Mapper\AbstractMapperTest
{
	/** @var \NovumWare\Test\Db\Table\Mapper\MockMapper|\Events\Mapper\EventsMapper */
	protected $eventsMapper;

	public function setUp() {
		parent::setUp();
		$mapperFactory = new AbstractMapperFactory;
		$this->eventsMapper = $mapperFactory->createServiceWithName($this->getApplicationServiceLocator(), 'eventsmappereventsmapper', '\Events\Mapper\EventsMapper');
		$this->eventsMapper->setTableGateway($this->getApplicationServiceLocator()->get('MockTableGateway'));
	}


	// ========================================================================= CONVENIENCE METHODS =========================================================================
	public function testFetchManyForVenueId() {
		$data = array(
			'id'		=>	'45',
			'venue_id'	=> '34'
		);

		$expectedSelect = $this->getSelect('events');
		$expectedSelect->where(['event_venue_id=?'=>$data['venue_id']]);
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'event_');
		$expectedModel = $this->eventsMapper->createModelFromData($data);

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelArray = $this->eventsMapper->fetchManyForVenueId($data['venue_id']);
		$this->assertEquals([$expectedModel], $returnedModelArray);
	}

	public function testFetchManyForVenueIdNoneFound() {
		$data = array(
			'id'		=>	'45',
			'venue_id'	=> '34'
		);

		$expectedSelect = $this->getSelect('events');
		$expectedSelect->where(['event_venue_id=?'=>$data['venue_id']]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelArray = $this->eventsMapper->fetchManyForVenueId($data['venue_id']);
		$this->assertEquals([], $returnedModelArray);
	}

	public function testFetchManyForMemberId() {
		$data = array(
			'id'	=> '23'
		);
		$expectedModel = $this->eventsMapper->createModelFromData($data); /*@var $expectedModel \Events\Model\EventModel */

		$expectedSelect = $this->getSelect('events');
		$expectedSelect->where(['event_member_id=?' => $data['id']]);
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'event_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->eventsMapper->fetchManyForMemberId($data['id']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForMemberIdNoneFound() {
		$data = array(
			'id'	=> '23'
		);
		$expectedSelect = $this->getSelect('events');
		$expectedSelect->where(['event_member_id=?' => $data['id']]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->eventsMapper->fetchManyForMemberId($data['id']);
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyForContactEmail() {
		$data = array(
			'email'	=> 'example@gmail.com'
		);
		$expectedModel = $this->eventsMapper->createModelFromData($data); /*@var $expectedModel \Events\Model\EventModel */

		$expectedSelect = $this->getSelect('events');
		$expectedSelect->where->like('event_contact_email', "%{$data['email']}%");
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'event_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->eventsMapper->fetchManyForContactEmail($data['email']);
		$this->assertEquals([$expectedModel], $returnedModelsArray);
	}

	public function testFetchManyForContactEmailNoneFound() {
		$data = array(
			'email'	=> 'example@gmail.com'
		);
		$expectedSelect = $this->getSelect('events');
		$expectedSelect->where->like('event_contact_email', "%{$data['email']}%");
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->eventsMapper->fetchManyForContactEmail($data['email']);
		$this->assertEquals([], $returnedModelsArray);
	}
}