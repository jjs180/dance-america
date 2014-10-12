<?php
namespace Events\Mapper;

class CostsMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'costs';
	protected $columnPrefix = 'cost_';
	protected $idColumn = 'cost_id';
	protected $modelClass = '\Events\Model\CostModel';

	// ========================================================================= HELPER METHODS =========================================================================
	/**
	 * @param int $eventId
	 * @return array of \Events\Model\CostModel
	 */
	public function fetchManyForEventId($eventId) {
		return $this->fetchManyWhere(['cost_event_id=?' => $eventId]);
	}
}