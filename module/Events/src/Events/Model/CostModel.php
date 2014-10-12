<?php
namespace Events\Model;

class CostModel extends \NovumWare\Model\AbstractModel
{
	public $id;
	public $event_id;
	public $person_type;
	public $amount;

	protected $mapperClass = '\Events\Mapper\CostsMapper';


	// ========================================================================= GET / SET METHODS =========================================================================

}