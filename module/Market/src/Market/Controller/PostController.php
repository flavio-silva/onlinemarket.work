<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\FormInterface;

class PostController extends AbstractActionController 
{
	use ListingsTableTrait;

	public $categories = [];
	private $postForm;
	private $cityCodeTable;
	
	public function setCityCodeTable($cityCodeTable)
	{
		$this->cityCodeTable = $cityCodeTable;
	}

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
		
		if ($this->params()->fromPost('submit')) {
			$this->postForm->setData($this->params()->fromPost());
			$this->postForm->setInputFilter($this->getServiceLocator()->get('market-post-filter'));
			if (!$this->postForm->isValid()) {
				$invalidViewModel = new ViewModel();
				$invalidViewModel->setTemplate('market/post/invalid.phtml');
				$viewModel->setVariable('form', $this->postForm);
				$invalidViewModel->addChild($viewModel);
				return $invalidViewModel;
			}			
			
			$cityCode = $this->cityCodeTable->getCodeById($this->postForm->getInputFilter()->getValue('city_code'));
			$this->postForm->getInputFilter()
				->get('city_code')
				->setValue($cityCode);
			
			$listingsTable = $this->getServiceLocator()->get('listings-table');
			$listingsTable->addPosting($this->postForm->getInputFilter()->getValues());
			$this->flashMessenger()->addSuccessMessage('Form submitted successfully ');
			return $this->redirect()->toRoute('home');
		}

		$viewModel->setVariable('form', $this->postForm);
		return $viewModel;
	}
}