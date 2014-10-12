<?php
namespace Events\Process;

use Admin\Constants\EmailConstants;

/**
 * @method Novumware\Process\ProcessResult sendApprovalEmailToAdmin(\Events\Model\EventModel $eventModel)
 * @method Novumware\Process\ProcessResult saveModel(\Events\Model\EventModel $eventModel)
 * @method Novumware\Process\ProcessResult insertModel(\Events\Model\EventModel $eventModel)
 * @method Novumware\Process\ProcessResult updateModel(\Events\Model\EventModel $eventModel)
 * @method Novumware\Process\ProcessResult setEventPropertiesFromFormData(\Events\Model\EventModel $eventModel, array $formData)
 */
class EventsProcess extends \NovumWare\Process\AbstractProcess
{
	/*
	 * @param \Events\Model\EventModel $eventModel
	 * @return \NovumWare\Process\ProcessResult
	 */
	public function _sendApprovalEmailToAdmin($eventModel) {
		$adminMemberModel = $this->getMembersMapper()->fetchOneForAdminPrivileges();
		$rejectEventLink = $this->urlCanonical('manage-events/reject', array(
			'eventId' =>	$eventModel->id
		));

		$acceptEventLink = $this->urlCanonical('manage-events/approve', array(
			'eventId' =>	$eventModel->id
		));
		$this->getEmailsProcess()->sendEmailFromTemplate($adminMemberModel->email, EmailConstants::APPROVE_EVENT_SUBMISSION, EmailConstants::APPROVE_EVENT_TEMPLATE, ['eventModel' => $eventModel, 'acceptEventLink' => $acceptEventLink, 'rejectEventLink' => $rejectEventLink]);
	}

	/**
	 * @param \Events\Model\EventModel $eventModel
	 * @return \NovumWare\Process\ProcessResult ->data \Events\Model\EventModel $eventModel
	 */
	public function _saveModel($eventModel) {
		if ($eventModel->id) $this->getEventsMapper()->updateModel($eventModel);
		else $this->getSessionEventsMapper()->saveModel($eventModel);

		return $eventModel;
	}

	/**
	 * @param \Events\Model\EventModel $eventModel
	 * @return \NovumWare\Process\ProcessResult
	 */
	public function _insertModel($eventModel) {
		if ($eventModel->will_stop == 0) {
			$dateTime = new \DateTime($eventModel->end_date);
			$dateTime->add(new \DateInterval('P1Y'));
			$eventModel->end_date = $dateTime->format('Y-m-d');
		}
		$this->getEventsMapper()->insertModel($eventModel);
		$repetitionModelsArray = $eventModel->repetitions;
		$costModelsArray = $eventModel->costs;

		if (!empty($repetitionModelsArray)) {
			foreach ($repetitionModelsArray as $repetition) { /*@var $repetition \Events\Model\RepetitionModel */
				$repetition->event_id = $eventModel->id;
				$this->getRepetitionsMapper()->insertModel($repetition);
			}
		}
		if (!empty($costModelsArray)) {
			foreach ($costModelsArray as $cost) { /*@var $cost \Events\Model\CostModel */
				$cost->event_id = $eventModel->id;
				$this->getCostsMapper()->insertModel($cost);
			}
		}
		$this->getSessionEventsMapper()->delete();
	}

	/**
	 * @param \Events\Model\EventModel $eventModel
	 * @return \NovumWare\Process\ProcessResult
	 */
	public function _updateModel($eventModel) {
		$repetitionModelsArray = $this->getRepetitionsMapper()->fetchManyForEventId($eventModel->id);
		foreach ($eventModel->repetitions as $repetition) { /*@var $repetition \Events\Model\RepetitionModel */
			$repetition->event_id = $eventModel->id;
			if ($repetition->id && $repetition->repetition_parameter == '' || $repetition->repetition_parameter == 'one time event') $this->getRepetitionsMapper()->deleteModel($repetition);
			elseif ($repetition->id && isset($repetition->repetition_parameter)) $this->getRepetitionsMapper()->updateModel($repetition);
			elseif ($repetition->repetition_parameter != 'one time event' && !$repetition->id) $this->getRepetitionsMapper()->insertModel($repetition);
		}

		foreach ($repetitionModelsArray as $repetitionFromDb) {
			$found = false;
			foreach ($eventModel->repetitions as $repetition) if ($repetition == $repetitionFromDb) $found = true;
			if (!$found) $this->getRepetitionsMapper ()->deleteModel($repetitionFromDb);
		}

		$costModelsArrayFromDb = $this->getCostsMapper()->fetchManyForEventId($eventModel->id);
		foreach ($eventModel->costs as $cost) { /*@var $cost \Events\Model\CostModel */
			$cost->event_id = $eventModel->id;
			if ($cost->id && isset($cost->person_type) && $cost->amount) $this->getCostsMapper()->updateModel($cost);
			elseif ($cost->id && isset($cost->person_type) && $cost->amount === '0') $this->getCostsMapper()->updateModel($cost);
			elseif (!isset($cost->person_type) || !isset($cost->amount)) $this->getCostsMapper()->deleteModel($cost);
			elseif (!$cost->id) $this->getCostsMapper()->insertModel($cost);
		}
		foreach ($costModelsArrayFromDb as $costFromDb) {
			$found = false;
			foreach ($eventModel->costs as $cost) if ($cost == $costFromDb) $found = true;
			if (!$found) $this->getCostsMapper ()->deleteModel($costFromDb);
		}

		$this->getEventsMapper()->updateModel($eventModel);
	}

	/**
	 * @param \Events\Model\EventModel $eventModel
	 * @param array $formData
	 * @return \NovumWare\Process\ProcessResult
	 */
	public function _setEventPropertiesFromFormData($eventModel, $formData) {
		if ($eventModel->id) {
			if ($formData['repetitions'] != []) {
				foreach ($formData['repetitions'] as $repetitionPropertyArray) {
					if (!isset($repetitionPropertyArray['id'])) {
						$repetition = new \Events\Model\RepetitionModel($this->serviceManager);
						$repetition->setProperties($repetitionPropertyArray);
						$repetition->event_id = $eventModel->id;
						$this->getRepetitionsMapper()->insertModel($repetition);
					}
				}
			}
			if ($formData['costs'] != []) {
				foreach ($formData['costs'] as $costPropertyArray) {
					if (!isset($costPropertyArray['id'])) {
						$cost = new \Events\Model\CostModel($this->serviceManager);
						$cost->setProperties($costPropertyArray);
						$cost->event_id = $eventModel->id;
						$this->getCostsMapper()->insertModel($cost);
					}
				}
			}
		}
		$eventModel->setProperties($formData);
		$eventModel->name = str_replace("\"", '', $eventModel->name);
		if ($formData['url'] != '') $eventModel->web_links = rtrim(implode(';', $formData['url']));

		return $eventModel;
	}


	// ================================================================= FACTORY METHODS============================================================
	/**
	 * @return \Events\Mapper\CostsMapper
	 */
	private function getCostsMapper() {
		if (!isset($this->_costsMapper)) $this->_costsMapper = $this->serviceManager->get('\Events\Mapper\CostsMapper');
		return $this->_costsMapper;
	}

	/**
	 * @return \Events\Mapper\EventsMapper
	 */
	private function getEventsMapper() {
		if (!isset($this->eventsMapper)) $this->eventsMapper = $this->serviceManager->get('\Events\Mapper\EventsMapper');
		return $this->eventsMapper;
	}

	/**
	 * @return \Registration\Mapper\MembersMapper
	 */
	private function getMembersMapper() {
		if (!isset($this->membersMapper)) $this->membersMapper = $this->serviceManager->get('Registration\Mapper\MembersMapper');
		return $this->membersMapper;
	}

	/**
	 * @return \Events\Mapper\RepetitionsMapper
	 */
	private function getRepetitionsMapper() {
		if (!isset($this->_repetitionsMapper)) $this->_repetitionsMapper = $this->serviceManager->get('\Events\Mapper\RepetitionsMapper');
		return $this->_repetitionsMapper;
	}


	/**
	 * @return \Events\Mapper\SessionEventsMapper
	 */
	private function getSessionEventsMapper() {
		if (!isset($this->_sessionEventsMapper)) $this->_sessionEventsMapper = $this->serviceManager->get('\Events\Mapper\SessionEventsMapper');
		return $this->_sessionEventsMapper;
	}

	/**
	 * @return \NovumWare\Process\EmailsProcess
	 */
	private function getEmailsProcess() {
		if (!isset($this->_emailsProcess)) $this->_emailsProcess = $this->serviceManager->get('NovumWare\Process\EmailsProcess');
		return $this->_emailsProcess;
	}
}
