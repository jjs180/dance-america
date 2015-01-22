<?php
namespace Application\Controller;
use Application\Constants\SiteSearchParamConstants;
use Application\Form\SearchSiteForm;

class IndexController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	// ========================================================================= ACTIONS =========================================================================
    public function indexAction() {
		$returnParams = array(
			'siteSearchParams'		=>	array(SiteSearchParamConstants::classes, SiteSearchParamConstants::events, SiteSearchParamConstants::instructors, SiteSearchParamConstants::socialDances),
			'danceStyles'			=> $this->getDanceStylesMapper()->fetchAll()
		);
		$this->setReturnParams($returnParams);
		if ($this->getRequest()->isPost()) {
			$data = $this->getRequest()->getPost('siteSearchForm');
			$siteSearchForm = new SearchSiteForm($this->getRequest()->getPost('siteSearchForm'));
			if (!$siteSearchForm->isValid()) { $this->nwFlashMessenger()->addErrorMessage(MessageConstants::ERROR_INVALID_FORM); return $this->getReturnParams(); }

			$siteSearchFormData = $siteSearchForm->getData();

			if (!$data['search_param']) return;
			$searchParam = $data['search_param'];

			if ($data['location']['city'] && $data['location']['state'] || $data['location']['postal_code']) {
				$data['location']['geo_coordinates'] = $this->getGeoForLocation($data['location']);
				$results = [];

				if ($searchParam == SiteSearchParamConstants::instructors) {
					$results = $this->getPeopleMapper()->fetchAll();
				} else if ($searchParam == SiteSearchParamConstants::events || $searchParam == SiteSearchParamConstants::classes || $searchParam == SiteSearchParamConstants::socialDances) {
					if ($data['radius']) {
						$results = $this->getEventsMapper()->fetchManyForTypeAndLocation($data);
					} else {
						if ($data['location']['city'] && $data['location']['state']) $results = $this->getEventsMapper()->fetchManyForCityState($data);
						else if ($data['location']['postal_code']) $results = $this->getEventsMapper()->fetchManyForPostalCode($data);
					}
				}
				$returnParams = array_merge($returnParams, array('results' => $results));
			} else {
				$results = $this->getEventsMapper()->fetchManyWithParams($data);
				$returnParams = array_merge($returnParams, array('results' => $results));
			}
		}
		$this->setReturnParams($returnParams);
		return $this->getReturnParams();
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
