<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface 
{
    public function createService(ServiceLocatorInterface $controllerManager) 
    {
        $serviceManager = $controllerManager->getServiceLocator();        
        $indexController = new IndexController();        
        $indexController->setListingsTable($serviceManager->get('listings-table'));
        return $indexController;
    }
}