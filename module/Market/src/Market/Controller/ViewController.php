<?php

namespace Market\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class ViewController extends AbstractActionController 
{
    use ListingsTableTrait;

    public function indexAction() 
    {
        $category = $this->params()
                ->fromRoute('param');
        $ListingsTable = $this->getServiceLocator()->get('listings-table');
        $listOfItems = $ListingsTable->getListingsByCategory();
        return new ViewModel([
            'category' => $category,
            'listOfItems' => $listOfItems
        ]);
    }

    public function itemAction() 
    {
        $item = $this->params()
                ->fromRoute('param');
        
        $listingsTable = $this->getServiceLocator()->get('listings-table');
        $row = $listingsTable->getListingById($item);
        
        if (empty($item) OR $row === false) {
            $this->flashMessenger()->addMessage('Item Not Found');
            return $this->redirect()->toRoute('market');
        }
        
        return new ViewModel([
            'item' => $item,
            'row' => $row
        ]);
    }
}