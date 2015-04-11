<?php

namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class DeleteForm extends Form
{
    
    public function __construct()
    {
        parent::__construct('delete');
        $this->setAttribute('method', 'POST')
                ->setAttribute('class', 'form-horizontal');
    }
    
    public function buildForm()
    {
        $deleteCode = new Element\Text('delete_code');
        
        $deleteCode->setAttributes([
            'placeholder' => 'Type a delete code',
            'required' => 'required',
            'id' => 'delete_code',
            'class' => 'form-control'
        ])
            ->setLabel('Delete Code');
        
        $itemId = new Element\Text('item_id');
        $itemId->setLabel('Item ID')
                ->setAttributes([
                    'placeholder' => 'Type a item ID',
                    'required' => 'required',
                    'id' => 'item_id',
                    'class' => 'form-control'
                ]);
        
        $submit = new Element\Submit('submit');
        $submit->setAttributes([
            'value' => 'Submit',
            'class' => 'btn btn-default'
        ]);
        
        $this->add($deleteCode)
                ->add($itemId)
                ->add($submit);
    }
}
