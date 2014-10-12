<?php
namespace Venues\Mapper;

class SessionVenuesMapper extends \NovumWare\Db\Table\Mapper\Session\AbstractSessionMapper
{
	protected $modelClass = '\Venues\Model\VenueModel';
	protected $sessionName = 'venue';
}