<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\CityContryFilter;

class CityCountryFilterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = new CityContryFilter();
        $filter->buildFilter();
        return $filter;
    }

}
