<?php

namespace Market\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Crypt\PublicKey\Rsa\PublicKey;

class ViewController extends AbstractActionController
{
	public function indexAction()
	{
		echo 'Essa é a action index do controller ViewController';
		$category = $this->params()
						->fromRoute('param');
		
		return new ViewModel([
			'category' => $category
		]);
	}
	
	public function itemAction()
	{
		echo 'Essa é a action item do controller ViewController';
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