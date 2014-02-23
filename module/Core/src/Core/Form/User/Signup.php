<?php
/**
 * Signup Form
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Form\User;
// see https://github.com/doctrine/DoctrineModule/blob/master/docs/validator.md
use DoctrineModule\Validator\NoObjectExists as NoObjectExistsValidator;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\StdLib\Hydrator\ClassMethods;
use Zend\Form\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

class Signup extends Form implements ObjectManagerAwareInterface, InputFilterAwareInterface
{

    protected $inputFilter;

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
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Username',
                'label_attributes' => array(
                    'for' => 'Username',
                    'class'  => 'control-label col-sm-2'
                ),
            ),
            /* 'validators' => array(
                'name' => 'DoctrineModule\Validator\NoObjectExists',
                'options' => array(
                    'object_repository' => $this->getObjectManager()->getRepository('Core\Entity\Affiliate'),
                    'fields'            => 'username',
                    'messages' => array( \DoctrineModule\Validator\NoObjectExists::ERROR_OBJECT_FOUND => "This object with code already exists in database." )
                )
            ) */
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
            'type' => 'Zend\Form\Element\Select',
            'name' => 'language',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'form-control'
            ),
            // 'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Language',
                'empty_option'    => '',
                'label_attributes' => array(
                    'for' => 'Language',
                    'class'  => 'control-label col-sm-2'
                ),
                'value_options' => $this->getLanguages(),
                // we don't need all the languages but only those with status 1
                // 'object_manager' => $this->getObjectManager(),
                // 'target_class' => 'Core\Entity\Language',
                // 'property' => 'name',
            )
        ));


        // email
        $this->add(array(
            'type'    => 'Zend\Form\Element\Email',
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
            'type'    => 'Zend\Form\Element\Password',
            'name' => 'password',
            'attributes' => array(
                'type'  => 'password',
                'placeholder' => 'Password',
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Password',
                'label_attributes' => array(
                    'class'  => 'control-label col-sm-2'
                ),
            ),
        ));

        // password 
        $this->add(array(
            'type'    => 'Zend\Form\Element\Password',
            'name' => 'password2',
            'attributes' => array(
                'type'  => 'password',
                'placeholder' => 'Password',
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Password2',
                'label_attributes' => array(
                    'class'  => 'control-label col-sm-2'
                ),
            ),
            'validators' => array(
                array('identical', false, array('token' => 'password'))
            )
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

        
        /* 
        $inputFilter = new InputFilter();
        $factory = new InputFactory();
        $inputFilter->add($factory->createInput(array(
            'name' => 'email',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array( 
                    'name' => 'Zend\Validator\NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => "My NotEmpty message here..."
                        )
                    )
                ),
            )
        ))); 
        */
            

        $email = $this->getInputFilter()->get('email');

        $emailAddressValidator = new \Zend\Validator\EmailAddress(
            array(
                'domain' => FALSE,
                'messages' => array(
                    \Zend\Validator\EmailAddress::INVALID => "Invalid type given. String expected",
                    \Zend\Validator\EmailAddress::INVALID_FORMAT => "This is not a valid email address"
                )
            ) 
        );

        $NotEmptyValidator = new \Zend\Validator\NotEmpty(array('integer', 'zero'));

        $RegexValidator = new \Zend\Validator\Regex(
            array(
                'pattern' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/',
                'messages' => array(
                    \Zend\Validator\Regex::NOT_MATCH => "The input does not match against pattern",
                )
            )
        );
        $email->getValidatorChain()->attach($emailAddressValidator)->attach($RegexValidator);


        // password
        $password1 = $this->getInputFilter()->get('password');
        $password2 = $this->getInputFilter()->get('password2');

        $passwordIdentical = new \Zend\Validator\Identical( array('token' => 'password') );
        $password1->getValidatorChain()->attach($NotEmptyValidator);
        $password2->getValidatorChain()->attach($NotEmptyValidator)->attach($passwordIdentical);




        // $entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
        $username = $this->getInputFilter()->get('username');
        $noObjectExistsValidator = new NoObjectExistsValidator(array(
            'object_repository' => $this->getObjectManager()->getRepository('Core\Entity\User'),
            'fields' => 'username',
            'messages' => array(
                \DoctrineModule\Validator\NoObjectExists::ERROR_OBJECT_FOUND => 'The username is already exists !'
            )
        ));        
        $username->getValidatorChain()->attach($noObjectExistsValidator);



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


    public function getLanguages() 
    {
        $array = array();
        $languages = $this->getObjectManager()->getRepository('Core\Entity\Language')->findBy(array('status' => 1));

        foreach ($languages as $key => $language) 
        {
            $array[$language->getId()] = $language->getName();
        }

        return $array;
    }


}

