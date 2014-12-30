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
		$modelsArray = $this->fetchManyWithSelect($select);
		return $modelsArray;
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

	public function fetchManyForTypeAndLocation($type, $data) {
//		$select = $this->getSelect();
//		$selectOptions = $this->getSelectOptions();
//		$select->
//		$lat_range = $data['radius']/69.172;
		$lat_range = 15/69.172;
//        $lon_range = abs($data['radius']/(cos($location['lon']) * 69.172));
		$lon_range = abs($data['radius']/(cos($data['location']['lon']) * 69.172));
//		$min_lat = number_format($data['location']['lat'] - $lat_range, "4", ".", "");
//		$max_lat = number_format($data['location']['lat'] + $lat_range, "4", ".", "");
//		$min_lon = number_format($data['location']['lon'] - $lon_range, "4", ".", "");
//		$max_lon = number_format($data['location']['lon'] + $lon_range, "4", ".", "");
		$min_lat = 30;
		$max_lat = 40;
		$min_lon = -125;
		$max_lon = -120;
		$sql = "SELECT * FROM venues WHERE venue_latitude BETWEEN '".$min_lat."' AND '".$max_lat."' AND venue_longitude BETWEEN '".$min_lon."' AND '".$max_lon."' AND venue_status != 'archived'";
		$db = new Adapter(
			array(
				'driver'        => 'Pdo',
				'dsn'            => 'mysql:dbname=dance_america;host=localhost',
				'username'       => 'root',
				'password'       => 'root',
				)
		);
		$stmt = $db->query($sql);
		$results = $stmt->execute();

		if($results->count() > 0){
			$ruleSet = new ResultSet();
			$resultsArray = $ruleSet->initialize($results)->toArray();
		}
		return $resultsArray;
	}

}