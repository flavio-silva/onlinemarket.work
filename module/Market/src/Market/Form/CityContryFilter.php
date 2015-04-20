<?php

namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class CityContryFilter extends InputFilter
{
    public function buildFilter()
    {
        $city = new Input('city');
        $city->setRequired(true)
                ->getValidatorChain()
                ->attachByName('Digits')
                ->attachByName('StringLength',['max' => 128]);
        
        $country = new Input('country');
        $country->setRequired(true);
        $country->getValidatorChain()
                ->attachByName('Digits')
                ->attachByName('StringLength', ['max' => 2]);
                
        $this->add($city)
                ->add($country);
    }
}
