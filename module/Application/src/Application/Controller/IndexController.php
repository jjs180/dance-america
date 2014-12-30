<?php
namespace Application\Controller;
use Application\Constants\SiteSearchParamConstants;
use Application\Form\SearchSiteForm;

class IndexController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	// ========================================================================= ACTIONS =========================================================================
    public function indexAction() {
		if ($this->getRequest()->isPost()) {
			$data = $this->getRequest()->getPost('siteSearchForm');
			$siteSearchForm = new SearchSiteForm($this->getRequest()->getPost('siteSearchForm'));
			if (!$siteSearchForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }

			$siteSearchFormData = $siteSearchForm->getData();

			if (!$data['search_param']) return;
			$searchParam = $data['search_param'];

			$results = [];
			if ($searchParam == SiteSearchParamConstants::instructors) {
				$results = $this->getPeopleMapper()->fetchAll();
			} else if ($searchParam == SiteSearchParamConstants::events || $searchParam == SiteSearchParamConstants::classes || $searchParam == SiteSearchParamConstants::socialDances) {
				$location = $this->getGeoForLocation($data['location']);
				$searchData = ['radius' => $data['radius'], 'location' => $location];
				$results = $this->getEventsMapper()->fetchManyForTypeAndLocation($searchParam, $searchData);
			}
			return array('results' => $results);
		} else {
			$this->setReturnParams(array(
				'siteSearchParams'		=>	array(SiteSearchParamConstants::classes, SiteSearchParamConstants::events, SiteSearchParamConstants::instructors, SiteSearchParamConstants::socialDances),
				'danceStyles' => $this->getDanceStylesMapper()->fetchAll()
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

	/**
	 * @return \DanceStyles\Mapper\DanceStylesMapper
	 */
	private function getDanceStylesMapper() {
		if (!isset($this->_danceStylesMapper)) $this->_danceStylesMapper = $this->getServiceLocator()->get('\DanceStyles\Mapper\DanceStylesMapper');
		return $this->_danceStylesMapper;
	}

	/*
	 * @param int $postalCode
	 */
	private function getGeoForLocation($data) {
		if (is_array($data)) {
			$address = $data['city'].' '.$data['state'].' '.'United States of America';
			$Address = urlencode($address);
			$cleanedAddress = str_replace('++', '+', $Address);
			$request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$cleanedAddress."&sensor=true";
			$xml = simplexml_load_file($request_url) or die("url not loading");
			$status = $xml->status;
			if ($status=="OK") {
				$Lat = (string) $xml->result->geometry->location->lat;
				$Lon = (string) $xml->result->geometry->location->lng;
			} else {
				throw new ProcessException('There was an error with this address. Please try again.');
			}
			return array(
				'lat'	=> $Lat,
				'lon'	=> $Lon
			);
		}

	}
}
