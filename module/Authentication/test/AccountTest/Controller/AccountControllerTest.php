<?php
namespace AuthenticationTest\Controller;

//use Application\Constants\MessageConstants as ApplicationMessageConstants;
//use NovumWare\Process\ProcessResult;

class AccountControllerTest extends \NovumWare\Test\Controller\AbstractControllerTest
{
	/** @var \Mockery\Mock */
	protected $mockAuthAdapter;

	/** @var \Mockery\Mock */
	protected $mockAuthSession;


	public function setUp() {
		parent::setUp();
		$this->mockAuthAdapter = $this->getApplicationServiceLocator()->get('Authentication\AuthAdapter');
		$this->mockAuthSession = $this->getApplicationServiceLocator()->get('Authentication\Session');
	}

	public function testIndexAction() {
		$data = array(
			'id'	=>	'23',
			'email'	=>	'john.doe@gmail.com'
		);
		$memberModel = $this->getMockMembersMapper()->createModelFromData($data);
		$this->getMockMembersMapper()->shouldReceive('fetchOneForId')->with($data['id'])->andReturn($memberModel);
		$this->setLoggedInUserWithRole();
		$this->dispatch('/account');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('account');
		$this->assertModuleName('Account');
		$this->assertControllerClass('AccountController');
		$this->assertActionName('account');

		$this->assertArrayHasKey('memberModel', $this->getResultVariables());
	}

	public function testMyEventsAction() {
		$dataEvent = array(
			'id'	=>	'20',
			'name'	=>	'Shirley\'s Sock Hop'
		);

		$dataVenue = array(
			'id'	=>	'20',
			'name'	=>	'Shirley\'s Stop and Dance'
		);
		$eventModel = $this->getMockEventsMapper()->createModelFromData($dataEvent);
		$eventModelsArray = [$eventModel, $eventModel, $eventModel];
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$this->getMockEventsMapper()->shouldReceive('fetchManyForMemberId')->andReturn($eventModelsArray)->once();
		$this->getMockVenuesMapper()->shouldReceive('fetchOneForId')->andReturn($venueModel)->once();

		$this->setLoggedInUserWithRole();
		$this->dispatch('/account/my-events');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('account/my-events');
		$this->assertModuleName('Account');
		$this->assertControllerClass('AccountController');
		$this->assertActionName('my-events');

		$resultVariablesEventsArray = $this->getResultVariables('eventModelsArray');
		$this->assertEquals($eventModelsArray, $resultVariablesEventsArray);
	}

	public function testMyEventsActionNoEventsFound() {
		$this->getMockEventsMapper()->shouldReceive('fetchManyForMemberId')->andReturn([])->once();

		$this->setLoggedInUserWithRole();
		$this->dispatch('/account/my-events');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}

	public function testMyVenuesAction() {
		$dataVenue = array(
			'id'	=>	'20',
			'name'	=>	'Shirley\'s Stop and Dance'
		);
		$venueModel = $this->getMockVenuesMapper()->createModelFromData($dataVenue);
		$venueModelsArray = [$venueModel, $venueModel, $venueModel];
		$this->getMockVenuesMapper()->shouldReceive('fetchManyForMemberId')->andReturn($venueModelsArray)->once();

		$this->setLoggedInUserWithRole();
		$this->dispatch('/account/my-venues');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
		$this->assertMatchedRouteName('account/my-venues');
		$this->assertModuleName('Account');
		$this->assertControllerClass('AccountController');
		$this->assertActionName('my-venues');

		$resultVariablesVenuesArray = $this->getResultVariables('venueModelsArray');
		$this->assertEquals($venueModelsArray, $resultVariablesVenuesArray);
	}

	public function testMyVenuesActionNoVenuesFound() {
		$this->getMockVenuesMapper()->shouldReceive('fetchManyForMemberId')->andReturn([])->once();

		$this->setLoggedInUserWithRole();
		$this->dispatch('/account/my-venues');
		$this->assertNotRedirect();
		$this->assertResponseStatusCode(200);
	}


	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Mockery\Mock|\Registration\Mapper\MembersMapper
	 */
	protected function getMockMembersMapper() {
		if (!isset($this->_mockMembersMapper)) $this->_mockMembersMapper = $this->getApplicationServiceLocator()->get('\Registration\Mapper\MembersMapper');
		return $this->_mockMembersMapper;
	}

	/**
	 * @return \Mockery\Mock|\Venues\Mapper\VenuesMapper
	 */
	private function getMockVenuesMapper() {
		if (!isset($this->_mockVenuesMapper)) $this->_mockVenuesMapper = $this->getApplicationServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_mockVenuesMapper;
	}

	/**
	 * @return \Mockery\Mock|\Events\Mapper\EventsMapper
	 */
	private function getMockEventsMapper() {
		if (!isset($this->_mockEventsMapper)) $this->_mockEventsMapper = $this->getApplicationServiceLocator()->get('\Events\Mapper\EventsMapper');
		return $this->_mockEventsMapper;
	}
}