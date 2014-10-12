<?php
namespace Events\Mapper;

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

}