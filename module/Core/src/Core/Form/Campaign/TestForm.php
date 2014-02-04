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

use Zend\InputFilter\Factory as InputFactory;

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
            'class' => '',
            'style' => 'width:100%',
            ) 
        );


        // name
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => '',
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Name',
                'label_attributes' => array(
                    'for' => 'Name',
                    'class'  => 'form-label'
                ),
            ),
        ));

        // Bar
        $this->add(array(
            'name' => 'bar',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => '',
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Bar',
                'label_attributes' => array(
                    'for' => 'Name',
                    'class'  => 'form-label'
                ),
            ),
        ));

        // Foo depends on Bar
        $this->add(array(
            'name' => 'foo',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => '',
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Foo',
                'label_attributes' => array(
                    'for' => 'Name',
                    'class'  => 'form-label'
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
                    'class'  => 'form-label'
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
                    'class'  => 'form-label'
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

        // foo depends on bar
        $factory = new InputFactory();

        $inputFilter = $this->getInputFilter();
        $inputFilter->add($factory->createInput(array(
            'name' => 'foo',
            'validators' => array(
                    array(
                        'name' => 'Callback',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\Callback::INVALID_VALUE => 'Bar and Foo can not be equal!',
                            ),
                            'callback' => function($value, $context = array()) {
                                return ($context['bar'] == $value) ? false : true;
                            },
                        ),
                    ),
                )
            )
        ));


        // add validation to campaign name
        $inputFilter->add($factory->createInput(array(
            'name' => 'name',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 5,
                        'max' => 32
                    )
                )
            )
        )));


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