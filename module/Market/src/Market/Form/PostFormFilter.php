<?php

namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Filter;
use Zend\Validator;

class PostFormFilter extends InputFilter 
{
    private $categories;
    private $cityCode;

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
                ->attachByName('Alnum',['allowWhiteSpace' => true])
                ->attach(new Validator\StringLength());

        $titleFilter->getFilterChain()
                ->attach(new Filter\StripTags())
                ->attach(new Filter\StringTrim());
        
        $price = new Input('price');
        $price->getValidatorChain(new Validator\Regex('/^[0-9]{1,10}[0-9]{2}$/'));
        
        $dataExpires = new Input('data_expires');
        $dataExpires->setRequired(false);
        $dataExpires->getValidatorChain()
                ->attach(new Validator\Digits());
        
        $description = new Input('description');
        $description->setRequired(false);
        $description->getValidatorChain()
                    ->attach(new Validator\StringLength(), ['min' => 1, 'max' => 4096]);
        
        $photoFilename = new Input('photo_filename');
        $photoFilename->getValidatorChain()
                    ->attach(new Validator\Regex('/[a-z]+[a-z0-9]*/'));
        $photoFilename->setRequired(false);
        
        $contactName = new Input('contact_name');
        $contactName->setRequired(false);
        $contactName->getValidatorChain('[a-z]+[a-z0-9]*');
        
        $contactEmail = new Input('contact_email');
        $contactEmail->setRequired(false);
        $contactEmail->getValidatorChain()
                        ->attach(new Validator\EmailAddress());
        $contactPhone = new Input('contact_phone');
        $contactPhone->setRequired(false);
        $contactPhone->getValidatorChain()
                       ->attach(new Validator\Regex('/[0-9]{0,32}/'));
        
        $city = new Input('city_code');
        $city->setRequired(false);
        $city->getValidatorChain()
                ->attach(new Validator\InArray(['haystack' => $this->cityCode]));
        
        $deleteCode = new Input('delete_code');
        $deleteCode->getValidatorChain()
                ->attachByName('Alnum');
        $deleteCode->setRequired(false);
        
        $this->add($categoryFilter)
                ->add($titleFilter)
                ->add($price)
                ->add($dataExpires)
                ->add($description)
                ->add($photoFilename)
                ->add($contactName)
                ->add($contactEmail)
                ->add($contactPhone)
                ->add($city)
                ->add($deleteCode);
    }

    public function setCategories($categories) 
    {
        $this->categories = $categories;
    }
    
    public function setCityCode($cityCode) 
    {
        $this->cityCode = $cityCode;
    }
}
