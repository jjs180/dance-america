<?php
namespace Events\Model;

class RepetitionModel extends \NovumWare\Model\AbstractModel
{
	public $id;
	public $event_id;
	public $repetition_parameter;
	public $repetition_spacing;
	public $day_of_week;
	public $day_of_month;
	public $month_of_year;

	protected $mapperClass = '\Events\Mapper\RepetitionsMapper';


	// ========================================================================= GET / SET METHODS =========================================================================
}