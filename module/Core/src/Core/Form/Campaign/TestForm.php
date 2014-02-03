<?php
/**
 * Campaign Form
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Form\Campaign;

use Zend\Form\Form;
use Zend\Validator\ValidatorChain;
use Zend\Validator\ValidatorPluginManager;

class TestForm extends Form {

    protected $validatorManager;

    public function __construct(ValidatorPluginManager $validatorManager)
    {
        // we want to ignore the name passed
        parent::__construct();
        
        $this->validatorManager = $validatorManager;

        $today = new \DateTime();
        $tomorrow = clone $today;
        $tomorrow->modify('+1 day');


        $this->setAttributes( array(
            'role' => 'form', 
            'method' => 'post', 
            'class' => 'form-horizontal',
            'style' => 'width:100%',
            ) 
        );


        // name
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Name',
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Name',
                'label_attributes' => array(
                    'for' => 'Name',
                    'class'  => 'control-label col-sm-2'
                ),
            ),
        ));

        // started at
        $this->add(array(
            'name' => 'started_at',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Started',
                'class' => 'datetime',
                'id' => 'started_at',
                // 'value' => date("Y-m-d H:i"),
                'value' => $today->format("Y-m-d H:i"),
                'data-format' => "YYYY-MM-DD HH:mm",
                'data-template' => "D MMM YYYY HH mm",
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Started',
                'label_attributes' => array(
                    'for' => 'Started',
                    'class'  => 'control-label col-sm-2'
                ),
            ),
        ));


        // ended at
        $this->add(array(
            'name' => 'ended_at',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Ended',
                'class' => 'datetime',
                'id' => 'ended_at',
                'value' => $tomorrow->format("Y-m-d H:i"),
                'data-format' => "YYYY-MM-DD HH:mm",
                'data-template' => "D MMM YYYY HH mm",
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Ended',
                'label_attributes' => array(
                    'for' => 'Ended',
                    'class'  => 'control-label col-sm-2'
                ),
            ),
        ));

        // submit button
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Sign in',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary'
            ),
        ));  


        $this->setInputFilter($this->createInputValidation());

    }

    public function createInputValidation()
    {
        $inputFilter = $this->getInputFilter();
         
        $validatorChain = new ValidatorChain();
        $validatorChain->setPluginManager($this->validatorManager);
 
        $inputFilter->getFactory()->setDefaultValidatorChain($validatorChain);
         
        $inputFilter->add(array(
            'name'     => 'name',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'TestValidator'
                )
            ),
        ));
         
        return $inputFilter;
    }


}