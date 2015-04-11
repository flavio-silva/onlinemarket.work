<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    use ListingsTableTrait;
    
    public function indexAction()
    {           
    	$messages = array('Welcome to the Online Market');
        
        if($this->flashMessenger()->hasMessages()) {
            $messages = [];
            foreach($this->flashMessenger()->getMessages() as $message) {
                $messages[] = $message;
            }
        }
        
        $listingsTable = $this->getServiceLocator()->get('listings-table');
        $row = $listingsTable->getMostRecentListing();
        
    	return new ViewModel([
    		'messages' => $messages,
                'row' => $row
    	]);
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /module-specific-root/skeleton/foo
        return array();
    }
}
