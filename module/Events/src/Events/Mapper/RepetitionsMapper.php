<?php
namespace Events\Mapper;

class RepetitionsMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'repetition_descriptions';
	protected $columnPrefix = 'rd_';
	protected $idColumn = 'rd_id';
	protected $modelClass = '\Events\Model\RepetitionModel';

	// ========================================================================= HELPER METHODS =========================================================================
	/**
	 * @param int $eventId
	 * @return array of \Events\Model\RepetitionModel
	 */
	public function fetchManyForEventId($eventId) {
		return $this->fetchManyWhere(['rd_event_id=?' => $eventId]);
	}


}