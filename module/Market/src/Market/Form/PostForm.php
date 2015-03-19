<?php

namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class PostForm extends Form
{
    private $categories;    
    public $cityCodes = [];
    
    public function buildForm()
    {
        $category = new Element\Select('category');
        $category->setLabel('Category')
                    ->setValueOptions($this->categories);
        
        $title = new Element\Text('title');
        $title->setLabel('Title')
                ->setAttributes([
                    'placeholder' => 'type a title',
                    'title' => 'Title',
                    'id' => 'title',
                    'maxlength' => '128',
                    'size' => '50'
                ]);
        /*$price = new Element\Number('price');
        $price->setLabel('Price')
                ->setAttributes([
                   'type'  => 'number'                    
                ]);
        $dateExpires = new Element\Radio('date_expires');        
        $descritption = new Element\Textarea('description');        
        $photoFilename = new Element\Url('photo_filename');        
        $contactName = new Element\Text('contact_name');        
        $contactEmail = new Element\Email('contact_email');
        $contactEmail->setAttribute('type', 'email');        
        $contactPhone = new Element\Text('contact_phone');        
        $cityCode = new Element\Select('cityCode');        
        $deleteCode = new Element\Number('delete_code');        
        $captcha = new Element\Captcha('captcha');        */
        $submit = new Element\Submit('submit');
        $submit->setAttributes([
            'value' => 'Submit'
        ]);
        
        $this->add($category)
                ->add($title)
                ->add($submit)
                /*->add($price)
                ->add($dateExpires)
                ->add($descritption)
                ->add($photoFilename)
                ->add($contactName)
                ->add($contactEmail)
                ->add($contactPhone)
                ->add($cityCode)
                ->add($deleteCode)
                ->add($captcha)*/;
    }
    
    public function setCategories($categories) 
    {
        $this->categories = $categories;
    }
}