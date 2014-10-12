<?php
namespace EventsTest\Mapper;

use NovumWare\Db\Table\Mapper\AbstractMapperFactory;

class RepetitionsMapperTest extends \NovumWare\Test\Db\Table\Mapper\AbstractMapperTest
{
	/** @var \NovumWare\Test\Db\Table\Mapper\MockMapper|\Events\Mapper\RepetitionsMapper */
	protected $repetitionsMapper;

	public function setUp() {
		parent::setUp();
		$mapperFactory = new AbstractMapperFactory;
		$this->repetitionsMapper = $mapperFactory->createServiceWithName($this->getApplicationServiceLocator(), 'eventsmapperrepetitionsmapper', '\Events\Mapper\RepetitionsMapper');
		$this->repetitionsMapper->setTableGateway($this->getApplicationServiceLocator()->get('MockTableGateway'));
	}


	// ========================================================================= CONVENIENCE METHODS =========================================================================
	public function fetchManyForEventId() {
		$data = array(
			'id'		=>	'42',
			'event_id'	=>	'44'
		);
		$expectedSelect = $this->getSelect('repetitions');
		$expectedSelect->where(['repetition_event_id=?' => $data['id']]);
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'repetition_');
		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString(expectedSelect))->andReturn($resultSet)->once();

		$repetitionModel = $this->repetitionsMapper->createModelFromData($data);
		$expectedModelsArray = [$repetitionModel, $repetitionModel, $repetitionModel];
		$returnedModelsArray = $this->repetitionsMapper->fetchManyForEventId($data['event_id']);

		$this->assertEquals($expectedModelsArray, $returnedModelsArray);
	}

	public function testFetchManyForeventIdNoneFound() {
		$data = array(
			'id'		=>	'45',
			'event_id'	=> '34'
		);

		$expectedSelect = $this->getSelect('repetition_descriptions');
		$expectedSelect->where(['rd_event_id=?'=>$data['event_id']]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->repetitionsMapper->fetchManyForEventId($data['event_id']);
		$this->assertEquals([], $returnedModelsArray);
	}
}