<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\PostController;

class PostControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $controllerManager) {
        $serviceManager = $controllerManager->getServiceLocator();
        $categories = $serviceManager->get('categories');
        $postController = new PostController();

        $postController->setCategories($categories);
        $postController->setPostForm($serviceManager->get('market-post-form'));
        return $postController;
    }

}
