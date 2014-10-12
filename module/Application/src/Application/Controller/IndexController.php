<?php
namespace Application\Controller;

class IndexController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	// ========================================================================= ACTIONS =========================================================================
    public function indexAction() {
		$venueModelsArray = $this->getVenuesMapper()->fetchAll();
		$eventModelsArray = $this->getEventsMapper()->fetchAll();

		return array(
			'venueModelsArray'	=>	$venueModelsArray,
			'eventModelsArray'	=>	$eventModelsArray
		);
	}

	public function aboutAction() {}

	public function contactAction() {}


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
