<?php
namespace DanceStyles\Model;

use \Application\Constants\EventVenueStatusConstants;

class DanceStyleModel extends \NovumWare\Model\AbstractModel
{
	public $id;
	public $name;

	protected $mapperClass = '\DanceStyles\Mapper\DanceStylesMapper';

}
