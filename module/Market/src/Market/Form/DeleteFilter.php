<?php

namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class DeleteFilter extends InputFilter
{
    public function buildFilter()
    {
        $deleteCode = new Input('delete_code');
        $deleteCode->getValidatorChain()
                ->attachByName('Digits');
        
        $deleteCode->setRequired(true);
        
        $itemId = new Input('item_id');
        $itemId->getValidatorChain()
                ->attachByName('Digits');
        $itemId->setRequired(true);
        $this->add($deleteCode)
                ->add($itemId);
    }
}
