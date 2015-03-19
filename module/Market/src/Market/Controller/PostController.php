<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\FormInterface;

class PostController extends AbstractActionController 
{

    public $categories = [];
    private $postForm;

    public function setPostForm(FormInterface $postForm) 
    {
        $this->postForm = $postForm;
    }

    public function setCategories(array $categories) 
    {
        $this->categories = $categories;
    }

    public function indexAction() 
    {        
        $viewModel = new ViewModel();        
        $viewModel->setVariable('categories', $this->categories);
        $viewModel->setTemplate('market/post/index.phtml');
        
        if($this->params()->fromPost('submit')) {
            $this->postForm->setData($this->params()->fromPost());
            $this->postForm->setInputFilter($this->getServiceLocator()->get('market-post-filter'));
            if(!$this->postForm->isValid()) {
                $invalidViewModel = new ViewModel();
                $invalidViewModel->setTemplate('market/post/invalid.phtml');
                $viewModel->setVariable('form', $this->postForm);
                $invalidViewModel->addChild($viewModel);
                return $invalidViewModel;
            }
            $this->flashMessenger()->addSuccessMessage('Form submitted successfully ');
            return $this->redirect()->toRoute('home');
        }
        
        $viewModel->setVariable('form', $this->postForm);
        return $viewModel;
    }
}
