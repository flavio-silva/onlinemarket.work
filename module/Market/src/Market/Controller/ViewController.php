<?php

namespace Market\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class ViewController extends AbstractActionController
{
	public function indexAction()
	{
		$category = $this->params()
						->fromRoute('param');
		
		return new ViewModel([
			'category' => $category
		]);
	}
	
	public function itemAction()
	{
		$item = $this->params()
					->fromRoute('param');
		if(empty($item)) {
			$this->flashMessenger()->addMessage('Item Not Found');
			$this->redirect()->toRoute('market');
		}
		
		return new ViewModel([
			'item' => $item
		]);
	}
}