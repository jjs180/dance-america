<?php
namespace Admin\Controller;

use Application\Constants\EventVenueStatusConstants;

class AdminController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	public function adminAction() {}

	public function manageVenuesAction() {
		$venueModelsArray = $this->getVenuesMapper()->fetchAll();

		return array(
			'venueModelsArray'	=>	$venueModelsArray
		);
	}

	public function manageEventsAction() {
		$eventModelsArray = $this->getEventsMapper()->fetchAll();

		return array(
			'eventModelsArray'	=>	$eventModelsArray
		);
	}

	public function approveEventAction() {
		$eventId = $this->params('eventId');
		$eventModel = $this->getEventsMapper()->fetchOneForId($eventId);
		if (!$eventModel) throw new \Exception("Event: {$eventId} cannot be found"); /*@var $eventModel \Events\Model\EventModel */

		$eventModel->status = EventVenueStatusConstants::APPROVED;
		$this->getEventsMapper()->updateModel($eventModel);
		$this->nwFlashMessenger()->addSuccessMessage("You have approved a new event");

		return $this->redirect()->toRoute('manage-events');
	}

	public function approveVenueAction() {
		$venueId = $this->params('venueId');
		$venueModel = $this->getVenuesMapper()->fetchOneForId($venueId);
		if (!$venueModel) throw new \Exception("Venue: {$venueId} cannot be found"); /*@var $venueModel \Venues\Model\VenueModel */

		$venueModel->status = EventVenueStatusConstants::APPROVED;
		$this->getVenuesMapper()->updateModel($venueModel);

		$this->nwFlashMessenger()->addSuccessMessage("You have approved a new venue");

		return $this->redirect()->toRoute('manage-venues');
	}

	public function rejectEventAction() {
		$eventId = $this->params('eventId');
		$eventModel = $this->getEventsMapper()->fetchOneForId($eventId);
		if (!$eventModel) throw new \Exception("Event: {$eventId} cannot be found"); /*@var $eventModel \Events\Model\EventModel */

		$this->getEventsMapper()->deleteModel($eventModel);
		$this->nwFlashMessenger()->addMessage("The event: {$eventModel->id} has been rejected");

		return $this->redirect()->toRoute('manage-events');
	}

	public function rejectVenueAction() {
		$venueId = $this->params('venueId');
		$venueModel = $this->getVenuesMapper()->fetchOneForId($venueId);
		if (!$venueModel) throw new \Exception("Venue: {$venueId} cannot be found"); /*@var $venueModel \Venues\Model\VenueModel */

		$this->getVenuesMapper()->deleteModel($venueModel);
		$this->nwFlashMessenger()->addMessage("The venue: {$venueModel->id} has been rejected");

		return $this->redirect()->toRoute('manage-venues');
	}


	// ============================================================ FACTORY METHODS============================================================
	/**
	 * @return \Venues\Mapper\VenuesMapper
	 */
	private function getVenuesMapper() {
		if (!isset($this->_venuesMapper)) $this->_venuesMapper = $this->getServiceLocator()->get('\Venues\Mapper\VenuesMapper');
		return $this->_venuesMapper;
	}

	/**
	 * @return \Events\Mapper\EventsMapper
	 */
	private function getEventsMapper() {
		if (!isset($this->_eventsMapper)) $this->_eventsMapper = $this->getServiceLocator()->get('\Events\Mapper\EventsMapper');
		return $this->_eventsMapper;
	}
}