<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\ViewController;

class ViewControllerFactory implements FactoryInterface 
{
    public function createService(ServiceLocatorInterface $controllerManager) 
    {
        $serviceManager = $controllerManager->getServiceLocator();        
        $viewController = new ViewController();        
        $viewController->setListingsTable($serviceManager->get('listings-table'));
        return $viewController;
    }
}