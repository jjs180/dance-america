<?php
namespace Scraps\Mapper;

use NovumWare\Db\Sql\Select\SelectOptions;
use Scraps\Constants\ScrapsStatusConstants;

class ScrapsMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'scraps';
	protected $columnPrefix = 'scrap_';
	protected $idColumn = 'scrap_id';
	protected $modelClass = '\Scraps\Model\ScrapModel';

	// ======================================================= CONVENIENCE METHOD==================================================================
	public function fetchAll(SelectOptions $selectOptions=null) {
		if (!$selectOptions) $selectOptions = new SelectOptions;
		$selectOptions->order = $this->columnPrefix.'status';
		$scrapModelsArray = parent::fetchAll($selectOptions);

		return $scrapModelsArray;
	}

	public function fetchManyUnarchived() {
		return $this->fetchManyWhere(['scrap_status !=?' => ScrapsStatusConstants::ARCHIVED]);
	}

	public function fetchManyArchived() {
		return $this->fetchManyWhere(['scrap_status =?' => ScrapsStatusConstants::ARCHIVED]);
	}
}