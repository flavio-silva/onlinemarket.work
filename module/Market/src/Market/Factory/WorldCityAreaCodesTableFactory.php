<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Model\WorldCityAreaCodesTable;

class WorldCityAreaCodesTableFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator) 
	{
		$adapter = $serviceLocator->get('general-adapter');
		return new WorldCityAreaCodesTable(WorldCityAreaCodesTable::$tableName, $adapter);		
	}
}
