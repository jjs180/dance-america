<?php
namespace Events\Mapper;

class SessionEventsMapper extends \NovumWare\Db\Table\Mapper\Session\AbstractSessionMapper
{
	protected $modelClass = '\Events\Model\EventModel';
	protected $sessionName = 'event';
}