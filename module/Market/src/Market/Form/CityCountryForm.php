<?php

namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class CityCountryForm extends Form
{
    public function buildForm()
    {
        $city = new Element\Text('city');
        $city->setLabel('City')
                ->setAttributes([
                    'placeholder' => 'Type a code city',
                    'class' => 'form-control',
                    'maxlength' => '128',
                    'required' => 'required'
                ]);
        
        $country = new Element\Text('country');
        $country->setLabel('Country')
                ->setAttributes([
                   'placeholder' => 'Type a code country',
                    'class' => 'form-control',
                    'maxlength' => '2',
                    'required' => 'required'
                ]);
        
        $submit = new Element\Submit('submit');
        $submit->setAttributes([
           'value' => 'Submit',
            'class' => 'btn btn-default'
        ]);
        
        $this->add($city)
                ->add($country)
                ->add($submit);
        
    }
}
