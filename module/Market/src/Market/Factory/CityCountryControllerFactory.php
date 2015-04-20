<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\CityCountryController;

class CityCountryControllerFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $sm = $controllerManager->getServiceLocator();
        $form = $sm->get('market-city_country-form');
        $filter = $sm->get('market-city_country-filter');
        $form->setInputFilter($filter);

        $tableGateway = $sm->get('world_city_area_codes-table');
        $controller = new CityCountryController;

        return $controller->setForm($form)
                        ->setTableGateway($tableGateway);
    }
}
