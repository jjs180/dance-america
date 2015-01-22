<?php
namespace Events\Mapper;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class EventsMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'events';
	protected $columnPrefix = 'event_';
	protected $idColumn = 'event_id';
	protected $modelClass = '\Events\Model\EventModel';

	// ======================================================= CONVENIENCE METHOD==================================================================
	/**
	 * @return array of \Events\Model\EventModel
	 */
	public function fetchAll(\NovumWare\Db\Sql\Select\SelectOptions $selectOptions=null) {
		$select = $this->getSelect();
		$select->where(['event_status !=?' => 'archived']);
		return $this->fetchManyWithSelect($select);
	}

	/**
	 * @param string $venueId
	 * @return array of \Events\Model\EventModel
	 */
	public function fetchManyForVenueId($venueId) {
		return $this->fetchManyWhere(['event_venue_id=?' => $venueId]);
	}

	/**
	 * @param string $memberId
	 * @return array of \Events\Model\EventModel
	 */
	public function fetchManyForMemberId($memberId) {
		$select = $this->getSelect();
		$where = $select->where(['event_member_id=?'=> $memberId]);
		$where->where("event_status != 'archived'");
		return $this->fetchManyWithSelect($select);
	}

	/**
	 * @param string $contactEmail
	 * @return array of \Events\Model\EventModel
	 */
	public function fetchManyForContactEmail($contactEmail) {
		$where = $this->getWhere();
		$where->like('event_contact_email', "%{$contactEmail}%");
		return $this->fetchManyWhere($where);
	}

	public function fetchManyForTypeAndLocation($data) {
		$select = $this->getSelect();
		if (isset($data['radius'])) {
			$lon = $data['location']['geo_coordinates']['lon'];
			$lat = $data['location']['geo_coordinates']['lat'];
			
			$lat_range = abs($data['radius']/69.172);
			$lon_range = abs($data['radius']/(cos($lon) * 69.172));
		} else {
			$lat_range = 100/69.172;
			$lon_range = abs(100/(cos($lon) * 69.172));
		}

		if ($data['location']['geo_coordinates']['lat'] && $lat) {
			$min_lat = number_format($lat - $lat_range, "4", ".", "");
			$max_lat = number_format($lat + $lat_range, "4", ".", "");
			$min_lon = number_format($lon - $lon_range, "4", ".", "");
			$max_lon = number_format($lon + $lon_range, "4", ".", "");
			$select->where([
				"venues.venue_latitude BETWEEN $min_lat AND $max_lat",
				"venues.venue_longitude BETWEEN $min_lon AND $max_lon",
				"venues.venue_status != 'archived'",
				"events.event_status != 'archived'",
				"events.event_type" => $data['search_param']
			]);

			$select->join('venues', "$this->tableName.event_venue_id = venues.venue_id");
		}

		return $this->fetchManyWithSelect($select);
	}

	public function fetchManyForCityState($data) {
		$select = $this->getSelect();
		$select->join('venues', "$this->tableName.event_venue_id = venues.venue_id");
		$select->where([
			"venues.venue_city LIKE ?" => $data['location']['city'],
			"venues.venue_state LIKE ?" => $data['location']['state'],
			"events.event_status != 'archived'",
			"events.event_type" => $data['search_param']
		]);
		return $this->fetchManyWithSelect($select);
	}

	public function fetchManyForPostalCode($data) {
		$select = $this->getSelect();
		$select->join('venues', "$this->tableName.event_venue_id = venues.venue_id");
		$select->where([
			"venues.venue_postal_code LIKE ?" => $data['location']['postal_code'],
			"events.event_status != 'archived'",
			"events.event_type" => $data['search_param'],
		]);
		return $this->fetchManyWithSelect($select);
	}

	public function fetchManyWithParams($data) {
		$select = $this->getSelect();
		if ($data['dance_style']) {
			$select->where([
				"events.event_status != 'archived'",
				"events.event_type"		=> $data['search_param'],
				"events.event_dance_style"	=> $data['dance_style']
			]);
		} else {
			$select->where([
				"events.event_status != 'archived'" ,
				'events.event_type'	 => $data['search_param']
			]);
		}

		return $this->fetchManyWithSelect($select);
	}
}