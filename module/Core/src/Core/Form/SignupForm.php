<?php
/**
 * Signup Form
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Form;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\StdLib\Hydrator\ClassMethods;
use Zend\Form\Form;


class SignupForm extends Form implements ObjectManagerAwareInterface
{

    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('post');

        $this->setObjectManager($objectManager);

        // the "false" parameter instructs the hydrator NOT to convert camelCase to lowercase_underscore
        $this->setHydrator(new \Zend\Stdlib\Hydrator\ClassMethods(false));

        $this->setAttributes(array(
            'role' => 'form', 
            'method' => 'post', 
            'class' => 'form-horizontal') 
        );
        

        $this->add(array(
            'name' => 'some_hidden_field',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));


        // username
        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Username',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Username',
                'label_attributes' => array(
                    'for' => 'Username',
                    'class'  => 'control-label col-sm-2'
                ),
            ),
        ));


        // country
        $this->add(array(
            'name' => 'country',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'form-control'
            ),
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Country',
                'empty_option'    => '',
                'label_attributes' => array(
                    'for' => 'Country',
                    'class'  => 'control-label col-sm-2'
                ),
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Core\Entity\Country',
                'property' => 'name',
            )
        ));


        // language
        $this->add(array(
            'name' => 'language',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'form-control'
            ),
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Language',
                'empty_option'    => '',
                'label_attributes' => array(
                    'for' => 'Language',
                    'class'  => 'control-label col-sm-2'
                ),
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Core\Entity\Language',
                'property' => 'name',
            )
        ));


        // email
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Email',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Email',
                'label_attributes' => array(
                    'for' => 'Email',
                    'class'  => 'control-label col-sm-2'
                ),
            ),
        ));
        
        // password 
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type'  => 'password',
                'placeholder' => 'Password',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Password',
                'label_attributes' => array(
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
                'class' => 'btn btn-default'
            ),
        ));        

    }


    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
 
        return $this;
    }
 
    public function getObjectManager()
    {
        return $this->objectManager;
    }


}

