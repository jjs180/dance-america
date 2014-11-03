<?php
namespace People\Mapper;

class CostsMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'costs';
	protected $columnPrefix = 'cost_';
	protected $idColumn = 'cost_id';
	protected $modelClass = '\People\Model\CostModel';

	// ========================================================================= HELPER METHODS =========================================================================
	/**
	 * @param int $personId
	 * @return array of \People\Model\CostModel
	 */
	public function fetchManyForEventId($personId) {
		return $this->fetchManyWhere(['cost_person_id=?' => $personId]);
	}
}