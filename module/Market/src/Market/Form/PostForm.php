<?php

namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class PostForm extends Form
{
    private $categories;    
    static $cityCodes = ['001', '002', '003', '004', '005'];
    private $days;

    public function __construct()
    {
    	parent::__construct('listings');
    	$this->setAttribute('method', 'POST')
    			->setAttribute('class', 'form-horizontal');
    	
    }
    
    public function buildForm()
    {
        $category = new Element\Select('category');
        $category->setLabel('Category')
                    ->setValueOptions($this->categories)
                    ->setAttributes([
                    	'class' => 'form-control',
                        'required' => 'required'
                    ]);
        
        $title = new Element\Text('title');
        $title->setLabel('Title')
                ->setAttributes([
                    'class' => 'form-control',
                    'placeholder' => 'Type a title',
                    'title' => 'Title',
                    'id' => 'title',
                    'maxlength' => '128',
                    'size' => '50',
                     'required' => 'required'
                ]);
        $price = new Element\Number('price');
        $price->setLabel('Price')
                ->setAttributes([
                	'class' => 'form-control',
                   	'type'  => 'number',
                    'required' => 'required'
                ]);
        $dateExpires = new Element\Radio('date_expires');
        $dateExpires->setLabel('Date expires')
                    ->setValueOptions($this->days);
        $descritption = new Element\Textarea('description');
        $descritption->setLabel('Description')
        				->setAttributes([
					        	'class' => 'form-control',
					        	'rows' => '3'	
					        ]);
        
        $photoFilename = new Element\Url('photo_filename');
        $photoFilename->setLabel('Photo Filename')
        				->setAttributes([
        					'class' => 'form-control'
        				]);        
        $contactName = new Element\Text('contact_name');
        $contactName->setLabel('Contact Name')
        			->setAttributes([
        				'class' => 'form-control'
        			]);
        $contactEmail = new Element\Email('contact_email');
        $contactEmail->setLabel('Contact Email')
                        ->setAttributes([
                            'class' => 'form-control'
                        ]);
        
        $contactEmail->setAttribute('type', 'email');
        $contactPhone = new Element\Text('contact_phone');        
        $contactPhone->setLabel('Contact Phone')
                        ->setAttributes([
                            'class' => 'form-control'
                        ]);        
        $cityCode = new Element\Select('city_code');
        $cityCode->setLabel('City Code')
                ->setAttributes([
                   'class' => 'form-control'
                ])
                ->setValueOptions(array_combine(self::$cityCodes, self::$cityCodes));
        $deleteCode = new Element\Number('delete_code');
        $deleteCode->setLabel('Delete Code')
                ->setAttributes([
                    'class' => 'form-control'
                ]);
        
        $submit = new Element\Submit('submit');
        $submit->setAttributes([
            'value' => 'Submit',
            'class' => 'btn btn-default'
        ]);        
        
        $this->add($category)
                ->add($title)
                ->add($submit)
                ->add($price)
                ->add($dateExpires)
                ->add($descritption)
                ->add($photoFilename)
                ->add($contactName)
                ->add($contactEmail)
                ->add($contactPhone)
                ->add($cityCode)
                ->add($deleteCode);
                
    }
    
    public function setCategories($categories) 
    {
        $this->categories = $categories;
    }

    public function setDaysExpires(array $days)
    {
        $this->days = $days;
    }
}