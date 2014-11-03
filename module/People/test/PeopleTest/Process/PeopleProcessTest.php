<?php
namespace PeopleTest\Process;

use NovumWare\Process\AbstractProcessFactory;

class PeopleProcessTest extends \NovumWare\Test\Process\AbstractProcessTest
{
	/** @var \Mockery\Mock|\NovumWare\Test\Process\MockProcess|\People\Process\PeopleProcess */
	protected $peopleProcess;


	public function setUp() {
		parent::setUp();
		$processFactory = new AbstractProcessFactory;
		$this->peopleProcess = $processFactory->createServiceWithName($this->getApplicationServiceLocator(), 'peopleprocesspeopleprocess', '\People\Process\PeopleProcess');
	}

	public function testSendApprovalEmailToAdmin() {
		$dataEvent = array(
			'id'	=>	'25',
			'name'	=>	'Charlie Night Social'
		);
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);
		$adminMemberModel = $this->getMockMembersMapper()->createModelFromData();

		$this->getMockMembersMapper()->shouldReceive('fetchOneForAdminPrivileges')->withNoArgs()->andReturn($adminMemberModel)->once();
		$this->getMockEmailsProcess()->shouldReceive('sendEmailFromTemplate')->andReturnNull()->once();

		$personModelProcessResult = $this->peopleProcess->sendApprovalEmailToAdmin($personModel);
		$this->assertEquals($this->getProcessResultSuccess(), $personModelProcessResult);
	}

	public function testSaveModelFromMapper() {
		$data = array(
			'id'		=>	'78',
			'venue_id'	=>	'22'
		);
		$personModel = $this->getMockPeopleMapper()->createModelFromData($data);
		$this->getMockPeopleMapper()->shouldReceive('updateModel')->with($personModel)->andReturnNull()->once();
		$expectedProcessResult = $this->getProcessResultSuccess($personModel);
		$returnedProcessResult = $this->peopleProcess->saveModel($personModel);
		$this->assertEquals($expectedProcessResult, $returnedProcessResult);
	}

	public function testSaveModelFromSession() {
		$data = array(
			'name'		=>	'4th of july dance off',
			'venue_id'	=>	'22'
		);
		$personModel = $this->getMockPeopleMapper()->createModelFromData($data);
		$this->getMockSessionPeopleMapper()->shouldReceive('saveModel')->with($personModel)->andReturnNull()->once();
		$expectedProcessResult = $this->getProcessResultSuccess($personModel);
		$returnedProcessResult = $this->peopleProcess->saveModel($personModel);
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

		$personModel = $this->getMockPeopleMapper()->createModelFromData($data);

		$this->getMockPeopleMapper()->shouldReceive('insertModel')->with($personModel)->andReturn($personModel)->once();
		$this->getMockRepetitionsMapper()->shouldReceive('insertModel')->with($this->compareModel($repetitionModel))->andReturn($repetitionModel)->twice();
		$this->getMockCostsMapper()->shouldReceive('insertModel')->with($this->compareModel($costModel))->andReturn($costModel)->once();
		$this->getMockSessionPeopleMapper()->shouldReceive('delete')->withNoArgs()->andReturnNull()->once();
		$returnedProcessResult = $this->peopleProcess->insertModel($personModel);
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

		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);
		$personModel->setProperties(array(
			'costs'			=>	[$costModel, $costModel],
			'repetitions'	=>	[$repetitionModel]
		));

		$this->getMockCostsMapper()->shouldReceive('updateModel')->with($costModel)->andReturnNull()->twice();
		$this->getMockRepetitionsMapper()->shouldReceive('updateModel')->with($repetitionModel)->andReturnNull()->once();
		$this->getMockPeopleMapper()->shouldReceive('updateModel')->with($personModel)->once();

		$returnedProcessResult = $this->peopleProcess->updateModel($personModel);
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
			'repetition_parameter'	=>	'one time person',
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
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);

		$this->getMockCostsMapper()->shouldReceive('deleteModel')->with($costModel)->andReturnNull()->twice();
		$this->getMockRepetitionsMapper()->shouldReceive('deleteModel')->with($repetitionModel)->andReturnNull()->once();
		$this->getMockPeopleMapper()->shouldReceive('updateModel')->with($personModel)->once();

		$returnedProcessResult = $this->peopleProcess->updateModel($personModel);
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
		$personModel = $this->getMockPeopleMapper()->createModelFromData($dataEvent);

		$this->getMockCostsMapper()->shouldReceive('insertModel')->with($costModel)->andReturnNull()->twice();
		$this->getMockRepetitionsMapper()->shouldReceive('insertModel')->with($repetitionModel)->andReturnNull()->once();
		$this->getMockPeopleMapper()->shouldReceive('updateModel')->with($personModel)->once();
		$returnedProcessResult = $this->peopleProcess->updateModel($personModel);
		$this->assertEquals($this->getProcessResultSuccess(), $returnedProcessResult);
	}



	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Mockery\Mock|\People\Mapper\CostsMapper
	 */
	private function getMockCostsMapper() {
		if (!isset($this->_mockCostsMapper)) $this->_mockCostsMapper = $this->getApplicationServiceLocator()->get('\People\Mapper\CostsMapper');
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
	 * @return \Mockery\Mock|\People\Mapper\PeopleMapper
	 */
	private function getMockPeopleMapper() {
		if (!isset($this->_mockPeopleMapper)) $this->_mockPeopleMapper = $this->getApplicationServiceLocator ()->get('\People\Mapper\PeopleMapper');
		return $this->_mockPeopleMapper;
	}

	/**
	 * @return \Mockery\Mock|\Registration\Mapper\MembersMapper
	 */
	private function getMockMembersMapper() {
		if (!isset($this->_mockMembersMapper)) $this->_mockMembersMapper = $this->getApplicationServiceLocator()->get('\Registration\Mapper\MembersMapper');
		return $this->_mockMembersMapper;
	}

	/**
	 * @return \Mockery\Mock|\People\Mapper\RepetitionsMapper
	 */
	private function getMockRepetitionsMapper() {
		if (!isset($this->_mockRepetitionsMapper)) $this->_mockRepetitionsMapper = $this->getApplicationServiceLocator()->get('\People\Mapper\RepetitionsMapper');
		return $this->_mockRepetitionsMapper;
	}

	/**
	 * @return \Mockery\Mock|\People\Mapper\SessionPeopleMapper
	 */
	private function getMockSessionPeopleMapper() {
		if (!isset($this->_mockSessionPeopleMapper)) $this->_mockSessionPeopleMapper = $this->getApplicationServiceLocator ()->get('\People\Mapper\SessionPeopleMapper');
		return $this->_mockSessionPeopleMapper;
	}
}