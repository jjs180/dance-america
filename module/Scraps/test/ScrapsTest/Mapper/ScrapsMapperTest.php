<?php
namespace ScrapsTest\Mapper;

use NovumWare\Db\Table\Mapper\AbstractMapperFactory;
use Scraps\Constants\ScrapsStatusConstants;

class ScrapsMapperTest extends \NovumWare\Test\Db\Table\Mapper\AbstractMapperTest
{
	/** @var \NovumWare\Test\Db\Table\Mapper\MockMapper|\Scraps\Mapper\ScrapsMapper */
	protected $scrapsMapper;

	public function setUp() {
		parent::setUp();
		$mapperFactory = new AbstractMapperFactory;
		$this->scrapsMapper = $mapperFactory->createServiceWithName($this->getApplicationServiceLocator(), 'scrapsmapperscrapsmapper', '\Scraps\Mapper\ScrapsMapper');
		$this->scrapsMapper->setTableGateway($this->getApplicationServiceLocator()->get('MockTableGateway'));
	}


	// ========================================================================= CONVENIENCE METHODS =========================================================================
	public function testFetchAll() {
		$data = array(
			'name'	=>	'Gobble',
			'type'	=>	'Bar'
		);
		$dataArrays = [$data, $data];
		$expectedModel = $this->scrapsMapper->createModelFromData($data);
		$expectedModelsArray = [$expectedModel, $expectedModel];
		$expectedSelect = $this->getSelect('scraps');
		$expectedSelect->order('scrap_status');
		$resultSet = $this->createResultSetFromDataWithPrefix($dataArrays, 'scrap_');
		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
		$returnedModelsArray = $this->scrapsMapper->fetchAll();
		$this->assertEquals($expectedModelsArray, $returnedModelsArray);
	}


	public function testFetchAllNoneFound() {
		$expectedSelect = $this->getSelect('scraps');
		$expectedSelect->order('scrap_status');
		$resultSet = $this->createEmptyResultSet();
		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
		$returnedModelsArray = $this->scrapsMapper->fetchAll();
		$this->assertEquals([], $returnedModelsArray);
	}

	public function testFetchManyUnarchived() {
		$data = array(
			'id'		=>	'72',
			'status'	=> ScrapsStatusConstants::PROCESSING_COMPLETE
		);
		$dataArray = [$data, $data, $data];
		$scrapModel = $this->scrapsMapper->createModelFromData($data);
		$expectedScrapModelsArray = [$scrapModel, $scrapModel, $scrapModel];
		$expectedSelect = $this->getSelect('scraps');
		$expectedSelect->where(['scrap_status !=?' => ScrapsStatusConstants::ARCHIVED]);
		$resultSet = $this->createResultSetFromDataWithPrefix($dataArray, 'scrap_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
		$returnedScrapModelsArray = $this->scrapsMapper->fetchManyUnarchived();

		$this->assertEquals($expectedScrapModelsArray, $returnedScrapModelsArray);
	}

	public function testFetchManyUnarchivedNoneFound() {
		$expectedSelect = $this->getSelect('scraps');
		$expectedSelect->where(['scrap_status !=?' => ScrapsStatusConstants::ARCHIVED]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
		$returnedScrapModelsArray = $this->scrapsMapper->fetchManyUnarchived();

		$this->assertEquals([], $returnedScrapModelsArray);
	}

	public function testFetchManyArchived() {
		$data = array(
			'id'		=>	'72',
			'status'	=> ScrapsStatusConstants::ARCHIVED
		);
		$dataArray = [$data, $data, $data];
		$scrapModel = $this->scrapsMapper->createModelFromData($data);
		$expectedScrapModelsArray = [$scrapModel, $scrapModel, $scrapModel];
		$expectedSelect = $this->getSelect('scraps');
		$expectedSelect->where(['scrap_status =?' => ScrapsStatusConstants::ARCHIVED]);
		$resultSet = $this->createResultSetFromDataWithPrefix($dataArray, 'scrap_');

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
		$returnedScrapModelsArray = $this->scrapsMapper->fetchManyArchived();

		$this->assertEquals($expectedScrapModelsArray, $returnedScrapModelsArray);
	}

	public function testFetchManyArchivedNoneFound() {
		$expectedSelect = $this->getSelect('scraps');
		$expectedSelect->where(['scrap_status =?' => ScrapsStatusConstants::ARCHIVED]);
		$resultSet = $this->createEmptyResultSet();

		$this->mockTableGateway->shouldReceive('selectWith')->with($this->compareSqlString($expectedSelect))->andReturn($resultSet)->once();
		$returnedScrapModelsArray = $this->scrapsMapper->fetchManyArchived();

		$this->assertEquals([], $returnedScrapModelsArray);
	}
}