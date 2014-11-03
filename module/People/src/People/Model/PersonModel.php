<?php
namespace People\Model;

use \Application\Constants\EventVenueStatusConstants;

class EventModel extends \NovumWare\Model\AbstractModel
{
	public $id;
	public $venue_id;
	public $name;
	public $start_time;
	public $end_time;
	public $start_date;
	public $end_date;
	public $web_links;
	public $description;
	public $special_notes;
	public $minimum_age;
	public $status = EventVenueStatusConstants::PENDING_APPROVAL;
	public $member_id;
	public $will_stop;
	public $contact_email;
	public $time_updated;
	public $time_created;

	protected $mapperClass = '\People\Mapper\PeopleMapper';

	private $venue;
	private $repetitions;
	private $costs;


	// ========================================================================= GET / SET METHODS =========================================================================
	/**
	 * @return \People\Model\CostModel
	 */
	protected function getCosts() {
		if (!isset($this->costs)) throw new \Exception('The session should have set the costs array');
		if ($this->costs == [] && $this->id) $this->costs = $this->serviceManager->get('\People\Mapper\CostsMapper')->fetchManyForEventId($this->id);
		return $this->costs;
	}

	/**
	 * @return \People\Model\RepetitionModel
	 */
	protected function getRepetitions() {
		if (!isset($this->repetitions)) throw new \Exception('The session should have set the repetitions array');
		if ($this->repetitions == [] && $this->id) $this->repetitions = $this->serviceManager->get('\People\Mapper\RepetitionsMapper')->fetchManyForEventId($this->id);
		return $this->repetitions;
	}

	/**
	 * @return \Venues\Model\VenueModel
	 */
	protected function getVenue() {
		if (!isset($this->venue)) $this->venue = $this->serviceManager->get('\Venues\Mapper\VenuesMapper')->fetchOneForId($this->venue_id);
		return $this->venue;
	}

	/**
	 * @param array of \People\Model\CostModel
	 */
	protected function setCosts(array $costModelsArray) {
		if ($costModelsArray != [] && $costModelsArray[0]['amount'] !== '' && $costModelsArray[0]['person_type'] != '') {
			foreach ($costModelsArray as $cost) {
				if ($cost->person_type && $cost->amount) $cleanedCostModelsArray[] = $cost;
			}
		} else $cleanedCostModelsArray = [];

		$this->costs = $cleanedCostModelsArray;
	}

	/**
	 * @param array of \People\Model\RepetitionModel
	 */
	protected function setRepetitions(array $repetitionModelsArray) {
		if ($repetitionModelsArray != []) {
			foreach ($repetitionModelsArray as $repetition) { /*@var $repetition \People\Model\RepetitionModel */
				if ($repetition->repetition_parameter != 'one time person') $cleanedRepetitionModelsArray[] = $repetition;
				else $cleanedRepetitionModelsArray = [];
			}
		} else $cleanedRepetitionModelsArray = [];

		$this->repetitions = $cleanedRepetitionModelsArray;
	}


	// ========================================================================= HELPER METHODS =========================================================================
	public function toSessionArray() {
		$personPropertiesArray = $this->toArray();
		$personPropertiesArray['repetitions'] = $this->modelsArrayToSessionArray($this->getRepetitions());
		$personPropertiesArray['costs'] = $this->modelsArrayToSessionArray($this->getCosts());

		return $personPropertiesArray;
	}

	public function setProperties(array $propertiesArray) {
		parent::setProperties($propertiesArray);
		if (!isset($propertiesArray['repetitions'])) $propertiesArray['repetitions'] = [];
		if (!isset($propertiesArray['costs'])) $propertiesArray['costs'] = [];
		$this->setRepetitions($this->sessionArrayToModelsArrayUsingMapperClass($propertiesArray['repetitions'], '\People\Mapper\RepetitionsMapper'));
		$this->setCosts($this->sessionArrayToModelsArrayUsingMapperClass($propertiesArray['costs'], '\People\Mapper\CostsMapper'));

	}
}
