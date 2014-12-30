<?php
namespace People\Mapper;

class SessionPeopleMapper extends \NovumWare\Db\Table\Mapper\Session\AbstractSessionMapper
{
	protected $modelClass = '\People\Model\PersonModel';
	protected $sessionName = 'person';
}