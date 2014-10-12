<?php
namespace Venues\Process;

use Admin\Constants\EmailConstants;
use NovumWare\Process\ProcessException;

/**
 * @method \Novumware\Process\ProcessResult convertLatLongToAddress(string $latitude, string $longitude)
 * @method \Novumware\Process\ProcessResult insertVenueFromScrapModelAndVenueData(\Scraps\Model\ScrapModel $scrapModel, array $dataVenue)
 * @method \Novumware\Process\ProcessResult insertModel(\Venues\Model\VenueModel $venueModel)
 * @method \Novumware\Process\ProcessResult sendApprovalEmailToAdmin(\Venues\Model\VenueModel $venueModel)
 * @method \Novumware\Process\ProcessResult setVenuePropertiesFromForm(\Venues\Model\VenueModel $venueModel, array $formData)
 */
class VenuesProcess extends \NovumWare\Process\AbstractProcess
{
	 /**
 	 * @param string $latitude
 	 * @param string $longitude
 	 * @return \NovumWare\Process\ProcessResult
 	 */
 	public function _convertLatLongToAddress($latitude, $longitude) {
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false';
		$json = @file_get_contents($url);
		$data = json_decode($json);
		$status = $data->status;
		if ($status=="OK") {
			$address = $data->results[0]->formatted_address;
			$address1 = substr($address, 0, strpos($address, ','));
			$addressRemainder = substr($address, strlen($address1)+2);
			$country = substr($addressRemainder, strrpos($addressRemainder, ',')+2);
			$addressRemainder = substr($addressRemainder, 0, strrpos($addressRemainder, ' ')-1);
			$postalCode = substr($addressRemainder, strrpos($addressRemainder, ' ')+1);
			$addressRemainder = substr($addressRemainder, 0, strrpos($addressRemainder, ' '));
			$state = substr($addressRemainder, strrpos($addressRemainder, ',')+2);
			$addressRemainder = substr($addressRemainder, 0, strrpos($addressRemainder, ','));
			$city = substr($addressRemainder, strrpos($addressRemainder, ','));
			$addressRemainder = substr($addressRemainder, 0, strrpos($addressRemainder, ','));
			$address2 = $addressRemainder;
		} else throw new ProcessException("There was an error converting the latitude and longitude to an address.");

		$addressArray = array(
			'address_1'		=>	$address1,
			'address_2'		=>	$address2,
			'city'			=>	$city,
			'state'			=>	$state,
			'postal_code'	=>	$postalCode,
			'country'		=>	$country
		);

 		return $addressArray;
 	}

	/**
	 * @param \Scraps\Model\ScrapModel $scrapModel
	 * @param array $dataVenue
	 * @return \NovumWare\Process\ProcessResult $venueModel
	 */
	public function _insertVenueFromScrapModelAndVenueData($scrapModel, $dataVenue) {
		$addressArray = $this->_convertLatLongToAddress($scrapModel->latitude, $scrapModel->longitude); /*@var $processResult \NovumWare\Process\ProcessResult */
		$venueModel = $this->getVenuesMapper()->createModelFromData($dataVenue); /*@var $venueModel \Venues\Model\VenueModel */
		$venueModel->setProperties($addressArray);
		$this->getVenuesMapper()->insertModel($venueModel);
		$scrapModel->venue_id = $venueModel->id;

		return array(
			'scrapModel'	=>	$scrapModel,
			'venueModel'	=>	$venueModel
		);
	}

	/**
	 * @param type \Venues\Model\VenueModel $venueModel
	 */
	public function _insertModel($venueModel) {
		$potentialVenueModel = $this->getVenuesMapper()->fetchOneForLongitudeLatitude($venueModel->longitude, $venueModel->latitude);
		if (!$potentialVenueModel) $this->getVenuesMapper()->insertModel($venueModel);
		else throw new ProcessException('A venue with that address is already in our database');
	}

	/**
	 * @param type \Venues\Model\VenueModel $venueModel
	 */
	public function _updateModel($venueModel) {
		$potentialVenueModel = $this->getVenuesMapper()->fetchOneForLongitudeLatitude($venueModel->longitude, $venueModel->latitude);
		if (!$potentialVenueModel) $this->getVenuesMapper()->updateModel($venueModel);
		else throw new ProcessException('A venue with that address is already in our database');
	}

	/**
	 * @param \Venues\Model\VenueModel $venueModel
	 */
	public function _sendApprovalEmailToAdmin($venueModel) {
		$adminMemberModel = $this->getMembersMapper()->fetchOneForAdminPrivileges();
		if (!$adminMemberModel) throw new ProcessException("No administrator on file");
		$rejectVenueLink = $this->urlCanonical('manage-venues/reject', array(
			'venueId' =>	$venueModel->id
		));

		$acceptVenueLink = $this->urlCanonical('manage-venues/approve', array(
			'venueId' =>	$venueModel->id
		));
		$this->getEmailsProcess()->sendEmailFromTemplate($adminMemberModel->email, EmailConstants::APPROVE_VENUE_SUBMISSION, EmailConstants::APPROVE_VENUE_TEMPLATE, ['venueModel' => $venueModel, 'acceptVenueLink' => $acceptVenueLink, 'rejectVenueLink' => $rejectVenueLink]);
	}

	/**
	 * @param \Venues\Model\VenueModel $venueModel
	 * @param array $formData
	 * @return \NovumWare\Process\ProcessResult
	 * @throws ProcessException
	 */
	public function _setVenuePropertiesFromForm($venueModel, $formData) {
		$venueModel->setProperties($formData);
		$venueModel->name = str_replace("\"", "", $venueModel->name);
		$venueModel->address_1 = ucfirst(str_replace('#', '', $formData['address_1']));
		$venueModel->address_2 = ucfirst(str_replace('#', '', $formData['address_2']));
		$venueModel->city = ucfirst($formData['city']);

		if ($formData['url'] != '') $venueModel->web_links = rtrim(implode(';', $formData['url']));
		$address = $formData['address_1'].' '.($formData['address_2']).' '.($formData['city']).' '.$formData['state'].' '.$formData['postal_code'].' '.$formData['country'];
		$Address = urlencode($address);
		$cleanedAddress = str_replace('++', '+', $Address);
		$request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$cleanedAddress."&sensor=true";
		$xml = simplexml_load_file($request_url) or die("url not loading");
		$status = $xml->status;
		if ($status=="OK") {
			$Lat = (string) $xml->result->geometry->location->lat;
			$Lon = (string) $xml->result->geometry->location->lng;
			$venueModel->latitude = $Lat;
			$venueModel->longitude = $Lon;
		} else {
			throw new ProcessException('There was an error with this address. Please try again.');
		}
		return $venueModel;
	}

	// ================================================================= FACTORY METHODS============================================================
	/**
	 * @return \Registration\Mapper\MembersMapper
	 */
	private function getMembersMapper() {
		if (!isset($this->membersMapper)) $this->membersMapper = $this->serviceManager->get('Registration\Mapper\MembersMapper');
		return $this->membersMapper;
	}

	/**
	 * @return \Venues\Mapper\VenuesMapper
	 */
	private function getVenuesMapper() {
		if (!isset($this->_venuesMapper)) $this->_venuesMapper = $this->serviceManager->get('\Venues\Mapper\VenuesMapper');
		return $this->_venuesMapper;
	}

	/**
	 * @return \NovumWare\Process\EmailsProcess
	 */
	private function getEmailsProcess() {
		if (!isset($this->_emailsProcess)) $this->_emailsProcess = $this->serviceManager->get('NovumWare\Process\EmailsProcess');
		return $this->_emailsProcess;
	}
}
