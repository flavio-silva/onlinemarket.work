<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Model\ListingsTable;

class ListingsTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface$serviceLocator)
    {
        $adapter = $serviceLocator->get('general-adapter');        
        $tableModel = new ListingsTable(ListingsTable::$tableName, $adapter);
        
        return $tableModel;
    }
}
