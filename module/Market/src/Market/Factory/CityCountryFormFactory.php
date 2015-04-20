<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\CityCountryForm;

class CityCountryFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = $serviceLocator->get('market-city_country-filter');        
        $form = new CityCountryForm('city_country');
        
        $form->buildForm();
        $form->setInputFilter($filter);
        
        return $form;
    }
}
