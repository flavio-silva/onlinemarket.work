<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;

class PostFormFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceManager) {

        $postForm = new PostForm();
        $postForm->setCategories($serviceManager->get('categories'));
        
        $postForm->buildForm();
        $postForm->setInputFilter($serviceManager->get('market-post-filter'));
        return $postForm;
    }

}
