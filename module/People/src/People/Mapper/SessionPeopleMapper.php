<?php
namespace People\Mapper;

class SessionPeopleMapper extends \NovumWare\Db\Table\Mapper\Session\AbstractSessionMapper
{
	protected $modelClass = '\People\Model\EventModel';
	protected $sessionName = 'person';
}