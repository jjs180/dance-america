<?php
namespace Scraps\Controller;

use \Scraps\Constants\ScrapsStatusConstants;

class ScrapsController extends \NovumWare\Zend\Mvc\Controller\AbstractActionController
{
	public function manageScrapsAction() {
		$scrapModelsArray = $this->getScrapsMapper()->fetchManyUnarchived();
		$scrapStatusArray = array(
			'unprocessed'	=>	ScrapsStatusConstants::UNPROCESSED,
			'processing'	=>	ScrapsStatusConstants::PROCESSING,
			'processed'		=>	ScrapsStatusConstants::PROCESSED,
			'archived'		=>	ScrapsStatusConstants::ARCHIVED
		);

		return array(
			'scrapModelsArray'	=>	$scrapModelsArray,
			'scrapStatusArray'	=>	$scrapStatusArray
		);
	}

	public function viewAction() {
		$scrapId = $this->params('scrapId');

		$scrapModel = $this->getScrapsMapper()->fetchOneForId($scrapId); /*@var $scrapModel \Scraps\Model\ScrapModel */
		if (!$scrapModel) throw new \Exception("Entry: {$scrapId} could not be found.");

		return array(
			'scrapModel'	=>	$scrapModel
		);

		return $this->redirect()->toRoute('manage-scraps');
	}

	public function updateAction() {
		$scrapId = $this->params('scrapId');
		$status = $this->params('status');
		if ($status != ScrapsStatusConstants::ARCHIVED && $status != ScrapsStatusConstants::PROCESSED && $status != ScrapsStatusConstants::PROCESSING && $status != ScrapsStatusConstants::UNPROCESSED) throw new \Exception("Invalid scrap status");

		$scrapModel = $this->getScrapsMapper()->fetchOneForId($scrapId); /*@var $scrapModel \Scraps\Model\ScrapModel */
		if (!$scrapModel) throw new \Exception("Entry: {$scrapId} could not be found.");

		$scrapModel->status = $status;
		$this->getScrapsMapper()->updateModel($scrapModel);
		$this->nwFlashMessenger()->addSuccessMessage("Entry: {$scrapModel->name} has been updated.");

		return $this->redirect()->toRoute('manage-scraps');
	}

	public function archiveAction() {
		$scrapId = $this->params('scrapId');
		$scrapModel = $this->getScrapsMapper()->fetchOneForId($scrapId); /*@var $scrapModel \Scraps\Model\ScrapModel */
		if (!$scrapModel) throw new \Exception("Entry: {$scrapId} could not be found.");

		$scrapModel->status = ScrapsStatusConstants::ARCHIVED;
		$this->getScrapsMapper()->updateModel($scrapModel);
		$this->nwFlashMessenger()->addSuccessMessage("Your entry has been archived");

		return $this->redirect()->toRoute('manage-scraps');
	}

	public function archivedScrapsAction() {
		$scrapModelsArray = $this->getScrapsMapper()->fetchManyArchived();

		return array(
			'scrapModelsArray' =>	$scrapModelsArray
		);

	}


	// ========================================================================= FACTORY METHODS =========================================================================
	/**
	 * @return \Scraps\Mapper\ScrapsMapper
	 */
	private function getScrapsMapper() {
		if(!isset($this->scrapsMapper)) $this->scrapsMapper = $this->getServiceLocator()->get('\Scraps\Mapper\ScrapsMapper');
		return $this->scrapsMapper;
	}

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

	/**
	 * @return \Venues\Process\VenuesProcess
	 */
	private function getVenuesProcess() {
		if (!isset($this->_venuesProcess)) $this->_venuesProcess = $this->getServiceLocator()->get('\Venues\Process\VenuesProcess');
		return $this->_venuesProcess;
	}
}