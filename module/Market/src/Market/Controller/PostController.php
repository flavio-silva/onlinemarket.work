<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
	public $categories = [];
	
	public function setCategories(array $categories)
	{
		$this->categories = $categories;
	}
	
	public function indexAction()
	{
		$viewModel = new ViewModel([
			'categories' => $this->categories
		]);
		$viewModel->setTemplate('market/post/invalid.phtml');
		return $viewModel;
	}
}