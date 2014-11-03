<?php
namespace People\Mapper;

class PeopleMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'people';
	protected $columnPrefix = 'person_';
	protected $idColumn = 'person_id';
	protected $modelClass = '\People\Model\EventModel';

	// ======================================================= CONVENIENCE METHOD==================================================================
	/**
	 * @return array of \People\Model\EventModel
	 */
	public function fetchAll(\NovumWare\Db\Sql\Select\SelectOptions $selectOptions=null) {
		$select = $this->getSelect();
		$select->where(['person_status !=?' => 'archived']);
		$modelsArray = $this->fetchManyWithSelect($select);
		return $modelsArray;
	}

	/**
	 * @param float $lat
	 * @param float $long
	 * @param int $radius
	 * @return array of \People\Model\EventModel
	 */
	public function fetchManyForLocationAndRadius($lat, $long, $radius) {
		$select = $this->getSelect();
		$where = $select->where(['person_member_id=?'=> $memberId]);
		$where->where("person_status != 'archived'");
		return $this->fetchManyWithSelect($select);
	}

	/**
	 * @param string $memberId
	 * @return array of \People\Model\EventModel
	 */
	public function fetchManyForMemberId($memberId) {
		$select = $this->getSelect();
		$where = $select->where(['person_member_id=?'=> $memberId]);
		$where->where("person_status != 'archived'");
		return $this->fetchManyWithSelect($select);
	}

	/**
	 * @param string $contactEmail
	 * @return array of \People\Model\EventModel
	 */
	public function fetchManyForContactEmail($contactEmail) {
		$where = $this->getWhere();
		$where->like('person_contact_email', "%{$contactEmail}%");
		return $this->fetchManyWhere($where);
	}

}