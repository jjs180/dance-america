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
}