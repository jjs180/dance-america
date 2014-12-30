<?php
namespace DanceStyles\Mapper;

class DanceStylesMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'dance_styles';
	protected $columnPrefix = 'ds_';
	protected $idColumn = 'ds_id';
	protected $modelClass = '\DanceStyles\Model\DanceStyleModel';

	// ======================================================= CONVENIENCE METHOD==================================================================

}