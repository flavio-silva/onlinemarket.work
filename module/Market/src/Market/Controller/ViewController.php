<?php

namespace Market\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Crypt\PublicKey\Rsa\PublicKey;

class ViewController extends AbstractActionController
{
	public function indexAction()
	{
		$category = $this->params()->fromQuery('category');
		
		return new ViewModel([
			'category' => $category
		]);
	}
	
	public function itemAction()
	{
		$item = $this->params()
					->fromQuery('itemId');
		
		if(empty($item)) {
			$this->flashMessenger()->addMessage('Item Not Found');
			$this->redirect()->toRoute('market');
		}
		
		return new ViewModel([
			'item' => $item
		]);
	}
}