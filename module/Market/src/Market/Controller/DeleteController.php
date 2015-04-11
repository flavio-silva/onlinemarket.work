<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\FormInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\View\Model\ViewModel;
class DeleteController extends AbstractActionController
{

    public $deleteForm;
    public $deleteFilter;

    /**
     * @var \Market\Model\ListingsTable
     */
    public $listingsTable;

    public function setDeleteForm(FormInterface $deleteForm)
    {
        $this->deleteForm = $deleteForm;
        return $this;
    }

    public function setDeleteFilter(InputFilterInterface $deleteFilter)
    {
        $this->deleteFilter = $deleteFilter;
        return $this;
    }

    public function setListingsTable($listingsTable)
    {
        $this->listingsTable = $listingsTable;
        return $this;
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            $post = $this->params()->fromPost();

            $this->deleteForm->setInputFilter($this->deleteFilter);

            $this->deleteForm->setData($post);

            if ($this->deleteForm->isValid()) {
                $listingId = $this->deleteForm
                        ->getInputFilter()
                        ->getValue('item_id');
                
                $deleteCode = $this->deleteForm
                        ->getInputFilter()
                        ->getValue('delete_code');
                
                $this->listingsTable->deleteByDeleteCode($listingId, $deleteCode);
                $this->flashMessenger()->addMessage('It was deleted successfully');
                return $this->redirect()->toRoute('home');
            }
        }
        
        return new ViewModel(
            [
                'form' => $this->deleteForm
            ]
        );
    }

}
