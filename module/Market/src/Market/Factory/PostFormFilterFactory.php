<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostFormFilter;

class PostFormFilterFactory implements FactoryInterface 
{
    public function createService(ServiceLocatorInterface $serviceManager) 
    {        
        $postFormFilter = new PostFormFilter();
        $postFormFilter->setCategories(array_keys($serviceManager->get('categories')));
	$worldCityCodesTable = $serviceManager->get('world_city_area_codes-table');
        $postFormFilter->setCityCode(array_keys($worldCityCodesTable->getCodesForForm()));
        $postFormFilter->buildFilter();
        return $postFormFilter;
    }
}