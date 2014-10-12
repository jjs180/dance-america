<?php
namespace EventsTest\Process;

use NovumWare\Process\AbstractProcessFactory;

class EventsProcessTest extends \NovumWare\Test\Process\AbstractProcessTest
{
	/** @var \Mockery\Mock|\NovumWare\Test\Process\MockProcess|\Events\Process\EventsProcess */
	protected $eventsProcess;


	public function setUp() {
		parent::setUp();
		$processFactory = new AbstractProcessFactory;
		$this->eventsProcess = $processFactory->createServiceWithName($this->getApplicationServiceLocator(), 'eventsprocesseventsprocess', '\Events\Process\EventsProcess');
	}

	public function testSendApprovalEmailToAdmin() {
		$dataEvent = array(
			'id'	=>	'25',
			'name'	=>	'Charlie Night Social'
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$adminMemberModel = $this->getMockMembersMapper()->createModelFromData();

		$this->getMockMembersMapper()->shouldReceive('fetchOneForAdminPrivileges')->withNoArgs()->andReturn($adminMemberModel)->once();
		$this->getMockEmailsProcess()->shouldReceive('sendEmailFromTemplate')->andReturnNull()->once();

		$eventModelProcessResult = $this->eventsProcess->sendApprovalEmailToAdmin($eventModel);
		$this->assertEquals($this->getProcessResultSuccess(), $eventModelProcessResult);
	}

	public function testSaveModelFromMapper() {
		$data = array(
			'id'		=>	'78',
			'venue_id'	=>	'22'
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($data);
		$this->getMockEventsMapper()->shouldReceive('updateModel')->with($eventModel)->andReturnNull()->once();
		$expectedProcessResult = $this->getProcessResultSuccess($eventModel);
		$returnedProcessResult = $this->eventsProcess->saveModel($eventModel);
		$this->assertEquals($expectedProcessResult, $returnedProcessResult);
	}

	public function testSaveModelFromSession() {
		$data = array(
			'name'		=>	'4th of july dance off',
			'venue_id'	=>	'22'
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($data);
		$this->getMockSessionEventsMapper()->shouldReceive('saveModel')->with($eventModel)->andReturnNull()->once();
		$expectedProcessResult = $this->getProcessResultSuccess($eventModel);
		$returnedProcessResult = $this->eventsProcess->saveModel($eventModel);
		$this->assertEquals($expectedProcessResult, $returnedProcessResult);
	}

	public function testInsertModel() {
		$dataCost = array(
			'person_type'	=>	'member',
			'amount'		=>	'44'
		);

		$dataRepetition = array(
			'repetition_parameter'	=>	'months',
			'day_of_week'			=>	'Wednesday',
			'day_of_month'			=>	'1',
			'month_of_year'			=>	''
		);

		$costModel = $this->getMockCostsMapper()->createModelFromData($dataCost);
		$repetitionModel = $this->getMockRepetitionsMapper()->createModelFromData($dataRepetition);

		$data = array(
			'id'			=>	NULL,
			'venue_id'		=>	'22',
			'costs'			=>	[$costModel],
			'repetitions'	=>	[$repetitionModel, $repetitionModel]
		);

		$eventModel = $this->getMockEventsMapper()->createModelFromData($data);

		$this->getMockEventsMapper()->shouldReceive('insertModel')->with($eventModel)->andReturn($eventModel)->once();
		$this->getMockRepetitionsMapper()->shouldReceive('insertModel')->with($this->compareModel($repetitionModel))->andReturn($repetitionModel)->twice();
		$this->getMockCostsMapper()->shouldReceive('insertModel')->with($this->compareModel($costModel))->andReturn($costModel)->once();
		$this->getMockSessionEventsMapper()->shouldReceive('delete')->withNoArgs()->andReturnNull()->once();
		$returnedProcessResult = $this->eventsProcess->insertModel($eventModel);
		$this->assertEquals($this->getProcessResultSuccess(), $returnedProcessResult);
	}

	public function testUpdateModelAndUpdateRepetitionAndCost() {
		$dataCost = array(
			'id'			=>	'22',
			'person_type'	=>	'member',
			'amount'		=>	'44'
		);

		$dataRepetition = array(
			'id'					=>	'34',
			'repetition_parameter'	=>	'months',
			'day_of_week'			=>	'Wednesday',
			'day_of_month'			=>	'1',
			'month_of_year'			=>	''
		);

		$costModel = $this->getMockCostsMapper()->createModelFromData($dataCost);
		$repetitionModel = $this->getMockRepetitionsMapper()->createModelFromData($dataRepetition);

		$dataEvent = array(
			'id'			=>	'34',
			'name'			=>	'Atomic yearly shindig',
		);

		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$eventModel->setProperties(array(
			'costs'			=>	[$costModel, $costModel],
			'repetitions'	=>	[$repetitionModel]
		));

		$this->getMockCostsMapper()->shouldReceive('updateModel')->with($costModel)->andReturnNull()->twice();
		$this->getMockRepetitionsMapper()->shouldReceive('updateModel')->with($repetitionModel)->andReturnNull()->once();
		$this->getMockEventsMapper()->shouldReceive('updateModel')->with($eventModel)->once();

		$returnedProcessResult = $this->eventsProcess->updateModel($eventModel);
		$this->assertEquals($this->getProcessResultSuccess(), $returnedProcessResult);
	}

	public function testUpdateModelAndDeleteRepetitionAndCost() {
		$dataCost = array(
			'id'			=>	'22',
			'person_type'	=>	'',
			'amount'		=>	'44'
		);
		$dataRepetition = array(
			'id'					=>	'34',
			'repetition_parameter'	=>	'one time event',
			'day_of_week'			=>	'',
			'day_of_month'			=>	'',
			'month_of_year'			=>	''
		);
		$costModel = $this->getMockCostsMapper()->createModelFromData($dataCost);
		$repetitionModel = $this->getMockRepetitionsMapper()->createModelFromData($dataRepetition);
		$dataEvent = array(
			'id'			=>	'34',
			'repetitions'	=>	[$repetitionModel],
			'costs'			=>	[$costModel, $costModel]
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);

		$this->getMockCostsMapper()->shouldReceive('deleteModel')->with($costModel)->andReturnNull()->twice();
		$this->getMockRepetitionsMapper()->shouldReceive('deleteModel')->with($repetitionModel)->andReturnNull()->once();
		$this->getMockEventsMapper()->shouldReceive('updateModel')->with($eventModel)->once();

		$returnedProcessResult = $this->eventsProcess->updateModel($eventModel);
		$this->assertEquals($this->getProcessResultSuccess(), $returnedProcessResult);
	}

	public function testUpdateModelAndInsertRepetitionAndCost() {
		$dataCost = array(
			'id'			=>	NULL,
			'person_type'	=>	'member',
			'amount'		=>	'44'
		);
		$dataRepetition = array(
			'id'					=>	NULL,
			'repetition_parameter'	=>	'weeks',
			'day_of_week'			=>	'Tuesday',
			'day_of_month'			=>	'',
			'month_of_year'			=>	''
		);
		$costModel = $this->getMockCostsMapper()->createModelFromData($dataCost);
		$repetitionModel = $this->getMockRepetitionsMapper()->createModelFromData($dataRepetition);
		$dataEvent = array(
			'id'			=>	'34',
			'repetitions'	=>	[$repetitionModel],
			'costs'			=>	[$costModel, $costModel]
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);

		$this->getMockCostsMapper()->shouldReceive('insertModel')->with($costModel)->andReturnNull()->twice();
		$this->getMockRepetitionsMapper()->shouldReceive('insertModel')->with($repetitionModel)->andReturnNull()->once();
		$this->getMockEventsMapper()->shouldReceive('updateModel')->with($eventModel)->once();
		$returnedProcessResult = $this->eventsProcess->updateModel($eventModel);
		$this->assertEquals($this->getProcessResultSuccess(), $returnedProcessResult);
	}



	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Mockery\Mock|\Events\Mapper\CostsMapper
	 */
	private function getMockCostsMapper() {
		if (!isset($this->_mockCostsMapper)) $this->_mockCostsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\CostsMapper');
		return $this->_mockCostsMapper;
	}

	/**
	 * @return \Mockery\Mock|\Scraps\Mapper\ScrapsMapper
	 */
	private function getMockScrapsMapper() {
		if(!isset($this->_mockScrapsMapper)) $this->_mockScrapsMapper = $this->getApplicationServiceLocator()->get('\Scraps\Mapper\ScrapsMapper');
		return $this->_mockScrapsMapper;
	}

	/**
	 * @return \Mockery\Mock|\Events\Mapper\EventsMapper
	 */
	private function getMockEventsMapper() {
		if (!isset($this->_mockEventsMapper)) $this->_mockEventsMapper = $this->getApplicationServiceLocator ()->get('\Events\Mapper\EventsMapper');
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
	 * @return \Mockery\Mock|\Events\Mapper\SessionEventsMapper
	 */
	private function getMockSessionEventsMapper() {
		if (!isset($this->_mockSessionEventsMapper)) $this->_mockSessionEventsMapper = $this->getApplicationServiceLocator ()->get('\Events\Mapper\SessionEventsMapper');
		return $this->_mockSessionEventsMapper;
	}
}