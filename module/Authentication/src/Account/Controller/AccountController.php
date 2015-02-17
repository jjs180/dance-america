<?php
namespace Account\Controller;

class AccountController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	// ========================================================================= ACTIONS =========================================================================
	public function accountAction() {
		$memberModel = $this->getLoggedInMember(); /*@var $memberModel \Registration\Model\MemberModel */
		return array(
			'memberModel'	=> $memberModel
		);
	}

	public function myEventsAction() {
		$memberModel =$this->getLoggedInMember(); /*@var $memberModel \Registration\Model\MemberModel */

		$eventModelsArray = $this->getEventsMapper()->fetchManyForMemberId($memberModel->id);

		return array(
			'eventModelsArray'	=>	$eventModelsArray
		);
	}

	public function myVenuesAction() {
		$memberModel = $this->getLoggedInMember(); /*@var $memberModel \Registration\Model\MemberModel */

		$venueModelsArray = $this->getVenuesMapper()->fetchManyForMemberId($memberModel->id);

		return array(
			'venueModelsArray'	=>	$venueModelsArray
		);
	}

	public function myInstructorsAction() {
		$memberModel = $this->getLoggedInMember(); /*@var $memberModel \Registration\Model\MemberModel */

		$instructorModelsArray = $this->getPeopleMapper()->fetchManyForMemberId($memberModel->id);

		return array(
			'instructorModelsArray '	=>	$instructorModelsArray
		);
	}

	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Venues\Mapper\VenuesMapper
	 */
	private function getVenuesMapper() {
		if (!isset($this->_venuesMapper)) $this->_venuesMapper = $this->getServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_venuesMapper;
	}

	/**
	 * @return \Events\Mapper\EventsMapper
	 */
	private function getEventsMapper() {
		if (!isset($this->_eventsMapper)) $this->_eventsMapper = $this->getServiceLocator()->get('\Events\Mapper\EventsMapper');
		return $this->_eventsMapper;
	}

	/**
	 * @return \People\Mapper\PeopleMapper
	 */
	private function getPeopleMapper() {
		if (!isset($this->_peopleMapper)) $this->_peopleMapper = $this->getServiceLocator()->get('\People\Mapper\PeopleMapper');
		return $this->_peopleMapper;
	}
}