<?php

namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Filter;
use Zend\Validator;

class PostFormFilter extends InputFilter 
{
    private $categories;

    public function buildFilter() 
    {
        $categoryFilter = new Input('category');

        $categoryFilter->getValidatorChain()
                ->attach(new Validator\InArray(['haystack' => $this->categories]));

        $categoryFilter->getFilterChain()
                ->attach(new Filter\StringTrim())
                ->attach(new Filter\StripTags())
                ->attach(new Filter\StringToLower);

        $titleFilter = new Input('title');
        $titleFilter->getValidatorChain()
                ->attachByName('Alnum')
                ->attach(new Validator\StringLength());

        $titleFilter->getFilterChain()
                ->attach(new Filter\StripTags())
                ->attach(new Filter\StringTrim());
        
        /*$price = new Input('price');
        $price->getValidatorChain(new Validator\Regex('[0-9]+,[0-9]{2}'));
        
        $dataExpires = new Input('data_expires');
        $dataExpires->getValidatorChain()
                ->attach(new Validator\Digits());
        
        $description = new Input('description');
        $description->getValidatorChain()
                    ->attach(new Validator\StringLength());
        
        $photoFilename = new Input('photo_filename');
        $photoFilename->getValidatorChain()
                    ->attach(new Validator\Regex('[a-z]+[a-z0-9]*'));
        $photoFilename->setRequired(false);
        
        $contactName = new Input('contact_name');
        $contactName->getValidatorChain('[a-z]+[a-z0-9]*');
        
        $contactEmail = new Input('contact_email');
        $contactEmail->getValidatorChain()
                        ->attach(new Validator\EmailAddress());
        $contactPhone = new Input('contact_phone');
        $contactPhone->getValidatorChain()
                       ->attach(new Validator\Regex('[0-9]{2}[0-9]{8,9}'));
        $city = new Input('city');
        $city->getValidatorChain()
                ->attach(new Validator\InArray());
        
        $deleteCode = new Input('delete_code');
        $deleteCode->getValidatorChain()
                ->attachByName('Alnum');
        */
        $this->add($categoryFilter)
                ->add($titleFilter)
                /*->add($price)
                ->add($dataExpires)
                ->add($description)
                ->add($photoFilename)
                ->add($contactName)
                ->add($contactEmail)
                ->add($contactPhone)
                ->add($city)
                ->add($deleteCode)*/;
    }

    public function setCategories($categories) 
    {
        $this->categories = $categories;
    }
}
