<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\FormInterface;
use Zend\Db\TableGateway\TableGatewayInterface;

class CityCountryController extends AbstractActionController
{
    protected $form;    
    protected $tableGateway;
    
    public function setForm(FormInterface $form)
    {
        $this->form = $form;
        return $this;
    }
    
    public function setTableGateway(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
        return $this;
    }
    
    public function indexAction()
    {        
        $viewModel = new ViewModel(['form' => $this->form]);
        $viewModel->setTemplate('market/city-country/index.phtml');
        $request = $this->getRequest();
        
        if($request->isPost()) {
            
            $this->form->setData($request->getPost());
            
            if($this->form->isValid()) {
                $city = $this->form->getInputFilter()->getValue('city');
                $country = $this->form->getInputFilter()->getValue('country');
                
                $this->tableGateway->addCityAndCountry($city, $country);
                
                $this->flashMessenger()->addMessage('The city and country were inserted successfully');
                
                return $this->redirect()->toRoute('home');
            }
            
            $invalidViewModel = new ViewModel();
            $invalidViewModel->setTemplate('market/post/invalid.phtml');
            $viewModel->setVariable('form', $this->form);
            $invalidViewModel->addChild($viewModel);
                        
            return $invalidViewModel;
        }
        
        return $viewModel;
    }
}
