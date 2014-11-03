<?php
namespace Application\Controller;
use Application\Constants\SiteSearchParamConstants;

class IndexController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	// ========================================================================= ACTIONS =========================================================================
    public function indexAction() {
		if ($this->getRequest()->isPost()) {
			$data = $this->getRequest()->getPost('siteSearchForm');

			if (!$data['searchParam']) return;
			$searchParam = $data['searchParam'];

			if ($searchParam == SiteSearchParamConstants::instructors) {

				$this->getPeopleMapper()->fetchAll($selectOptions);
			}
			$this->setReturnParams(array(
//				'data' =>
			));
		} else {
			$this->setReturnParams(array(
				'siteSearchParams'		=>	array(SiteSearchParamConstants::classes, SiteSearchParamConstants::events, SiteSearchParamConstants::instructors, SiteSearchParamConstants::socialDances)
			));

			return $this->getReturnParams();
		}
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

	/**
	 * @return \People\Mapper\PeopleMapper
	 */
	private function getPeopleMapper() {
		if (!isset($this->_peopleMapper)) $this->_peopleMapper = $this->getServiceLocator()->get('\People\Mapper\PeopleMapper');
		return $this->_peopleMapper;
	}

	/*
	 * @param int $postalCode
	 */
	private function getGeoForPostalCode($postalCode) {

	}

	/*
	 * @param string $city
	 */
	private function getGeoForCity($city) {

	}
}
