<?php
namespace Authentication;

class Module extends \NovumWare\Module\NovumWareModule
{
	public function getAutoloaderConfig() {
		$parentConfigArray = parent::getAutoloaderConfig();
		return array_merge_recursive($parentConfigArray, array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					'Registration' => __DIR__ . '/src/' . 'Registration',
					'Account' => __DIR__ . '/src/' . 'Account',
					'Acl' => __DIR__ . '/src/' . 'Acl'
				)
			)
		));
	}

}