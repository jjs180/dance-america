<?php
namespace Venues\Mapper;

class VenuesMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'venues';
	protected $columnPrefix = 'venue_';
	protected $idColumn = 'venue_id';
	protected $modelClass = '\Venues\Model\VenueModel';

	// ======================================================= CONVENIENCE METHOD==================================================================
	/**
	 * @return array of \Venues\Model\VenueModel
	 */
	public function fetchAll(\NovumWare\Db\Sql\Select\SelectOptions $selectOptions=null) {
		$select = $this->getSelect();
		$select->where(['venue_status !=?' => 'archived']);
		$modelsArray = $this->fetchManyWithSelect($select);
		return $modelsArray;
	}


	/**
	 * @param string $venueModelCity
	 * @return array of \Venues\Model\VenueModel
	 */
	public function fetchManyForCity($venueModelCity) {
		$where = $this->getWhere();
		$where->like('venue_city', "%{$venueModelCity}%");
		return $this->fetchManyWhere($where);
	}

	/**
	 * @param string $memberId
	 * @return array of \Venues\Model\VenueModel
	 */
	public function fetchManyForMemberId($memberId) {
		return $this->fetchManyWhere(['venue_member_id=?' => $memberId]);
	}

	/**
	 * @param string $contactEmail
	 * @return array of \Venues\Model\VenueModel
	 */
	public function fetchManyForContactEmail($contactEmail) {
		$where = $this->getWhere();
		$where->like('venue_contact_email', "%{$contactEmail}%");
		return $this->fetchManyWhere($where);
	}

	/**
	 * @param string $venueModelName
	 * @return array of \Venues\Model\VenueModel
	 */
	public function fetchManyForName($venueModelName) {
		$where = $this->getWhere();
		$where->like('venue_name', "%{$venueModelName}%");
		return $this->fetchManyWhere($where);
	}

	/**
	 * @param string $venueModelState
	 * @return array of \Venues\Model\VenueModel
	 */
	public function fetchManyForState($venueModelState) {
		$where = $this->getWhere();
		$where->like('venue_state', "%{$venueModelState}%");
		return $this->fetchManyWhere($where);
	}

	/**
	 * @param string $venueModelPostalCode
	 * @return array of \Venues\Model\VenueModel
	 */
	public function fetchManyForPostalCode($venueModelPostalCode) {
		return $this->fetchManyWhere(['venue_postal_code=?' => $venueModelPostalCode]);
	}

	/**
	 * @param string $venueModelCountry
	 * @return array of \Venues\Model\VenueModel
	 */
	public function fetchManyForCountry($venueModelCountry) {
		$where = $this->getWhere();
		$where->like('venue_country', "%{$venueModelCountry}%");
		return $this->fetchManyWhere($where);
	}

	/**
	 * @param type $longitude
	 * @param type $latitude
	 * @return \Venues\Model\VenueModel
	 */
	public function fetchOneForLongitudeLatitude($longitude, $latitude) {

		return $this->fetchOneWhere(array(
			'venue_longitude'	=>	$longitude,
			'venue_latitude'	=>	$latitude
		));
	}

	/**
	 * @param Array $addressArray
	 * @return \Venues\Model\VenueModel
	 */
	public function fetchOneForAddress($addressArray) {
		return $this->fetchOneWhere(array(
			'venue_address_1'		=>	$addressArray['address_1'],
			'venue_address_2'		=>	$addressArray['address_2'],
			'venue_city'		 	=>	$addressArray['city'],
			'venue_state'			=>	$addressArray['state'],
			'venue_postal_code'		=>	$addressArray['postal_code'],
			'venue_country'			=>	$addressArray['country']
		));
	}

	// ================================================================= FACTORY METHODS============================================================
	/**
	 * @return \Venues\Process\VenuesProcess
	 */
//	private function getVenuesProcess() {
//		if (!isset($this->_venuesProcess)) $this->_venuesProcess = $this->serviceManager->get('\Venues\Process\VenuesProcess');
//		return $this->_venuesProcess;
//	}
}