<?php
namespace Venues\Model;

use Application\Constants\EventVenueStatusConstants;

class VenueModel extends \NovumWare\Model\AbstractModel
{
	public $id;
	public $name;
	public $address_1;
	public $address_2;
	public $city;
	public $state;
	public $postal_code;
	public $country;
	public $web_links;
	public $description;
	public $special_notes;
	public $type;
	public $status = EventVenueStatusConstants::PENDING_APPROVAL;
	public $member_id;
	public $contact_email;
	public $latitude;
	public $longitude;
	public $time_updated;
	public $time_created;

	protected $mapperClass = '\Venues\Mapper\VenuesMapper';


}