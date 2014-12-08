<?php
namespace People\Process;

use Admin\Constants\EmailConstants;

/**
 * @method Novumware\Process\ProcessResult sendApprovalEmailToAdmin(\People\Model\PersonModel $personModel)
 * @method Novumware\Process\ProcessResult saveModel(\People\Model\PersonModel $personModel)
 * @method Novumware\Process\ProcessResult insertModel(\People\Model\PersonModel $personModel)
 * @method Novumware\Process\ProcessResult updateModel(\People\Model\PersonModel $personModel)
 * @method Novumware\Process\ProcessResult setEventPropertiesFromFormData(\People\Model\PersonModel $personModel, array $formData)
 */
class PeopleProcess extends \NovumWare\Process\AbstractProcess
{
	/*
	 * @param \People\Model\PersonModel $personModel
	 * @return \NovumWare\Process\ProcessResult
	 */
	public function _sendApprovalEmailToAdmin($personModel) {
		$adminMemberModel = $this->getMembersMapper()->fetchOneForAdminPrivileges();
		$rejectEventLink = $this->urlCanonical('manage-people/reject', array(
			'personId' =>	$personModel->id
		));

		$acceptEventLink = $this->urlCanonical('manage-people/approve', array(
			'personId' =>	$personModel->id
		));
		$this->getEmailsProcess()->sendEmailFromTemplate($adminMemberModel->email, EmailConstants::APPROVE_EVENT_SUBMISSION, EmailConstants::APPROVE_EVENT_TEMPLATE, ['personModel' => $personModel, 'acceptEventLink' => $acceptEventLink, 'rejectEventLink' => $rejectEventLink]);
	}

	/**
	 * @param \People\Model\PersonModel $personModel
	 * @return \NovumWare\Process\ProcessResult ->data \People\Model\PersonModel $personModel
	 */
	public function _saveModel($personModel) {
		if ($personModel->id) $this->getPeopleMapper()->updateModel($personModel);
		else $this->getSessionPeopleMapper()->saveModel($personModel);

		return $personModel;
	}

	/**
	 * @param \People\Model\PersonModel $personModel
	 * @return \NovumWare\Process\ProcessResult
	 */
	public function _insertModel($personModel) {
		if ($personModel->will_stop == 0) {
			$dateTime = new \DateTime($personModel->end_date);
			$dateTime->add(new \DateInterval('P1Y'));
			$personModel->end_date = $dateTime->format('Y-m-d');
		}
		$this->getPeopleMapper()->insertModel($personModel);
		$repetitionModelsArray = $personModel->repetitions;
		$costModelsArray = $personModel->costs;

		if (!empty($repetitionModelsArray)) {
			foreach ($repetitionModelsArray as $repetition) { /*@var $repetition \People\Model\RepetitionModel */
				$repetition->person_id = $personModel->id;
				$this->getRepetitionsMapper()->insertModel($repetition);
			}
		}
		if (!empty($costModelsArray)) {
			foreach ($costModelsArray as $cost) { /*@var $cost \People\Model\CostModel */
				$cost->person_id = $personModel->id;
				$this->getCostsMapper()->insertModel($cost);
			}
		}
		$this->getSessionPeopleMapper()->delete();
	}

	/**
	 * @param \People\Model\PersonModel $personModel
	 * @return \NovumWare\Process\ProcessResult
	 */
	public function _updateModel($personModel) {
		$repetitionModelsArray = $this->getRepetitionsMapper()->fetchManyForEventId($personModel->id);
		foreach ($personModel->repetitions as $repetition) { /*@var $repetition \People\Model\RepetitionModel */
			$repetition->person_id = $personModel->id;
			if ($repetition->id && $repetition->repetition_parameter == '' || $repetition->repetition_parameter == 'one time person') $this->getRepetitionsMapper()->deleteModel($repetition);
			elseif ($repetition->id && isset($repetition->repetition_parameter)) $this->getRepetitionsMapper()->updateModel($repetition);
			elseif ($repetition->repetition_parameter != 'one time person' && !$repetition->id) $this->getRepetitionsMapper()->insertModel($repetition);
		}

		foreach ($repetitionModelsArray as $repetitionFromDb) {
			$found = false;
			foreach ($personModel->repetitions as $repetition) if ($repetition == $repetitionFromDb) $found = true;
			if (!$found) $this->getRepetitionsMapper ()->deleteModel($repetitionFromDb);
		}

		$costModelsArrayFromDb = $this->getCostsMapper()->fetchManyForEventId($personModel->id);
		foreach ($personModel->costs as $cost) { /*@var $cost \People\Model\CostModel */
			$cost->person_id = $personModel->id;
			if ($cost->id && isset($cost->person_type) && $cost->amount) $this->getCostsMapper()->updateModel($cost);
			elseif ($cost->id && isset($cost->person_type) && $cost->amount === '0') $this->getCostsMapper()->updateModel($cost);
			elseif (!isset($cost->person_type) || !isset($cost->amount)) $this->getCostsMapper()->deleteModel($cost);
			elseif (!$cost->id) $this->getCostsMapper()->insertModel($cost);
		}
		foreach ($costModelsArrayFromDb as $costFromDb) {
			$found = false;
			foreach ($personModel->costs as $cost) if ($cost == $costFromDb) $found = true;
			if (!$found) $this->getCostsMapper ()->deleteModel($costFromDb);
		}

		$this->getPeopleMapper()->updateModel($personModel);
	}

	/**
	 * @param \People\Model\PersonModel $personModel
	 * @param array $formData
	 * @return \NovumWare\Process\ProcessResult
	 */
	public function _setEventPropertiesFromFormData($personModel, $formData) {
		if ($personModel->id) {
			if ($formData['repetitions'] != []) {
				foreach ($formData['repetitions'] as $repetitionPropertyArray) {
					if (!isset($repetitionPropertyArray['id'])) {
						$repetition = new \People\Model\RepetitionModel($this->serviceManager);
						$repetition->setProperties($repetitionPropertyArray);
						$repetition->person_id = $personModel->id;
						$this->getRepetitionsMapper()->insertModel($repetition);
					}
				}
			}
			if ($formData['costs'] != []) {
				foreach ($formData['costs'] as $costPropertyArray) {
					if (!isset($costPropertyArray['id'])) {
						$cost = new \People\Model\CostModel($this->serviceManager);
						$cost->setProperties($costPropertyArray);
						$cost->person_id = $personModel->id;
						$this->getCostsMapper()->insertModel($cost);
					}
				}
			}
		}
		$personModel->setProperties($formData);
		$personModel->name = str_replace("\"", '', $personModel->name);
		if ($formData['url'] != '') $personModel->web_links = rtrim(implode(';', $formData['url']));

		return $personModel;
	}


	// ================================================================= FACTORY METHODS============================================================
	/**
	 * @return \People\Mapper\CostsMapper
	 */
	private function getCostsMapper() {
		if (!isset($this->_costsMapper)) $this->_costsMapper = $this->serviceManager->get('\People\Mapper\CostsMapper');
		return $this->_costsMapper;
	}

	/**
	 * @return \People\Mapper\PeopleMapper
	 */
	private function getPeopleMapper() {
		if (!isset($this->peopleMapper)) $this->peopleMapper = $this->serviceManager->get('\People\Mapper\PeopleMapper');
		return $this->peopleMapper;
	}

	/**
	 * @return \Registration\Mapper\MembersMapper
	 */
	private function getMembersMapper() {
		if (!isset($this->membersMapper)) $this->membersMapper = $this->serviceManager->get('Registration\Mapper\MembersMapper');
		return $this->membersMapper;
	}

	/**
	 * @return \People\Mapper\RepetitionsMapper
	 */
	private function getRepetitionsMapper() {
		if (!isset($this->_repetitionsMapper)) $this->_repetitionsMapper = $this->serviceManager->get('\People\Mapper\RepetitionsMapper');
		return $this->_repetitionsMapper;
	}


	/**
	 * @return \People\Mapper\SessionPeopleMapper
	 */
	private function getSessionPeopleMapper() {
		if (!isset($this->_sessionPeopleMapper)) $this->_sessionPeopleMapper = $this->serviceManager->get('\People\Mapper\SessionPeopleMapper');
		return $this->_sessionPeopleMapper;
	}

	/**
	 * @return \NovumWare\Process\EmailsProcess
	 */
	private function getEmailsProcess() {
		if (!isset($this->_emailsProcess)) $this->_emailsProcess = $this->serviceManager->get('NovumWare\Process\EmailsProcess');
		return $this->_emailsProcess;
	}
}
