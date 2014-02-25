<?php
/**
 * UserSignupForm
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Form;

use DoctrineModule\Validator\NoObjectExists as NoObjectExistsValidator;

use Zend\InputFilter\InputFilterProviderInterface;
use Zend\ServiceManager\ServiceManager;
use Zend\Form\Form;

class UserSignupForm  extends Form implements InputFilterProviderInterface
{

    protected $serviceManager;

    public function __construct(ServiceManager $serviceManager)
    {
    	$this->serviceManager = $serviceManager;
    	$entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');

        parent::__construct('user');

        // $this->setHydrator(new DoctrineHydrator($objectManager));
        
        $this->setAttributes(array(
            'role' => 'form', 
            'method' => 'post', 
            'class' => 'form-horizontal') 
        );

        // username
        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Username',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Username',
                'label_attributes' => array(
                    'for' => 'Username',
                    'class'  => 'control-label'
                ),
            ),
        ));


        // email
        $this->add(array(
            'type'    => 'email',
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
                    'class'  => 'control-label'
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
            ),
            'options' => array(
                'label' => 'Password',
                'label_attributes' => array(
                    'class'  => 'control-label'
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
            ),
            'options' => array(
                'label' => 'Password2',
                'label_attributes' => array(
                    'class'  => 'control-label'
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
                    'class'  => 'control-label'
                ),
                'object_manager' => $entityManager,
                'target_class' => 'Core\Entity\Country',
                'property' => 'name',
            )
        ));


        // language
        $this->add(array(
            // 'type' => 'Zend\Form\Element\Select',
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
                    'class'  => 'control-label'
                ),
                // 'value_options' => $this->getLanguages(),
                // we don't need all the languages but only those with status 1
                'object_manager' => $entityManager,
                'target_class' => 'Core\Entity\Language',
                'property' => 'name',
            )
        ));

        // submit button
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Sign in',
                'id' => 'submitbutton',
                'class' => 'btn btn-info btn-cons'
            ),
        ));   
    }



    public function getInputFilterSpecification()
    {
        $entityManager = $this->serviceManager->get('Doctrine\ORM\EntityManager');

        return array(
            'username' => array(
                'validators' => array(
                    array(
                        'name' => 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'object_repository' => $entityManager->getRepository('Core\Entity\User'),
                            'fields' => 'username',
                            'messages' => array(
                            	'objectFound' => "The username is already exists"
                            )
                        )
                    ),
                    array(
                    	'name' => 'Zend\Validator\StringLength',
                    	'options' =>  array(
                    		'min' => 6,
                    		'encoding' => 'UTF-8',
                    		'messages' => array(

                    		)
                    	)
                    ),
                )
            ),
            'email' => array(
            	'validators' => array(
            		array(
            			'name' => "Zend\Validator\EmailAddress",
            			'options' =>  array(
            				'messages' => array(
            					'emailAddressInvalidFormat' => 'EmailAddress custom emailAddressInvalidFormat'
            				)
            			)
            		),
            		array(
            			'name' => "Zend\Validator\Regex",
            			'options' =>  array(
            				'pattern' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/',
            				'messages' => array(
            					'regexNotMatch' => "Regex custom regexNotMatch"
            				)
            			)
            		),
            	)
            ),
            'password' => array(
            	'validators' => array(
            		array(
            			'name' => 'Zend\Validator\NotEmpty',
            			'options' =>  array(
            				'messages' => array()
            			)
            		),
            	)
            ),
            'password2' => array(
            	'validators' => array(
            		array(
            			'name' => 'Zend\Validator\NotEmpty',
            			'options' =>  array(
            				'messages' => array(
            					
            				)
            			)
            		),
            		array(
            			'name' => 'Zend\Validator\Identical',
            			'options' =>  array(
            				'token' => 'password',
            				'messages' => array(

            				)
            			)
            		),
                    array(
                    	'name' => 'Zend\Validator\StringLength',
                    	'options' =>  array(
                    		'min' => 6,
                    		'encoding' => 'UTF-8',
                    		'messages' => array(

                    		)
                    	)
                    ),
            	)
            ),
        );
    }


}