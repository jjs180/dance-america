<?php
namespace Scraps\Model;
/**
 * @property-read bool $hasEvents
 * @property-read array $events of \Events\Model\EventModel
 * @property-read \Venues\Model\VenueModel $venue
 */
class ScrapModel extends \NovumWare\Model\AbstractModel
{
	public $id;
	public $name;
	public $status;
	public $description;
	public $time_created;
	public $time_updated;

	protected $mapperClass = '\Scraps\Mapper\ScrapsMapper';

	private $hasEvents;
	private $events;
	private $venue;


	// ========================================================================= GET / SET METHODS =========================================================================
	/**
	 * @return boolean
	 */
	protected function getHasEvents() {
		if (!isset($this->hasEvents)) $this->hasEvents = $this->getEvents();
		if ($this->hasEvents) $this->hasEvents=true;
		else $this->hasEvents=false;

		return $this->hasEvents;
	}

	/**
	 * @return array of \Events\Model\EventModel
	 */
	protected function getEvents() {
		if (!isset($this->events)) $this->events = $this->serviceManager->get('\Events\Mapper\EventsMapper')->fetchManyForVenueId($this->venue_id);
		return $this->events;
	}

	/**
	 * @return \Venues\Model\VenueModel
	 */
	protected function getVenue() {
		if (!isset($this->venue)) $this->venue = $this->serviceManager->get('\Venues\Mapper\VenuesMapper')->fetchOneForId($this->venue_id);
		return $this->venue;
	}
}