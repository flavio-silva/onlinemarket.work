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
        $postFormFilter->setCityCode(\Market\Form\PostForm::$cityCodes);
        $postFormFilter->buildFilter();
        return $postFormFilter;
    }
}