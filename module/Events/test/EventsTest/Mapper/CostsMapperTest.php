<?php
namespace EventsTest\Mapper;

use NovumWare\Db\Table\Mapper\AbstractMapperFactory;

class CostsMapperTest extends \NovumWare\Test\Db\Table\Mapper\AbstractMapperTest
{
	/** @var \NovumWare\Test\Db\Table\Mapper\MockMapper|\Events\Mapper\CostsMapper */
	protected $costsMapper;

	public function setUp() {
		parent::setUp();
		$mapperFactory = new AbstractMapperFactory;
		$this->costsMapper = $mapperFactory->createServiceWithName($this->getApplicationServiceLocator(), 'eventsmappercostsmapper', '\Events\Mapper\CostsMapper');
		$this->costsMapper->setTableGateway($this->getApplicationServiceLocator()->get('MockTableGateway'));
	}


	// ========================================================================= CONVENIENCE METHODS =========================================================================
	public function fetchManyForEventId() {
		$data = array(
			'id'		=>	'42',
			'event_id'	=>	'44'
		);
		$expectedSelect = $this->getSelect('costs');
		$expectedSelect->where(['cost_event_id=?' => $data['id']]);
		$resultSet = $this->createResultSetFromDataWithPrefix($data, 'cost_');
		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$costModel = $this->costsMapper->createModelFromData($data);
		$expectedModelsArray = [$costModel, $costModel, $costModel];
		$returnedModelsArray = $this->costsMapper->fetchManyForEventId($data['event_id']);

		$this->assertEquals($expectedModelsArray, $returnedModelsArray);
	}

	public function testFetchManyForEventIdNoneFound() {
		$data = array(
			'id'		=>	'45',
			'event_id'	=> '34'
		);

		$expectedSelect = $this->getSelect('costs');
		$expectedSelect->where(['cost_event_id=?'=>$data['event_id']]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();

		$returnedModelsArray = $this->costsMapper->fetchManyForEventId($data['event_id']);
		$this->assertEquals([], $returnedModelsArray);
	}
}