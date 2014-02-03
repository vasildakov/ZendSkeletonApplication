<?php
namespace Core;

/* doctrine config must be here */
return array(

    'validators' => array(
        'invokables' => array(
            'TestValidator' => 'Core\Validator\TestValidator' 
         ),
    ),
    'form_elements' => array(
        'factories' => array(
            'TestForm' => 'Core\Form\Campaign\TestFormFactory'
        ),                        
    ),
    'data-fixture' => array(
        'location' => __DIR__ . '/../src/Core/Fixture',
    ),
    'doctrine' => array(
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Core\Entity\User',
                'identity_property' => 'email',
                'credential_property' => 'password',
            ),
        ),
        /*'fixture' => array(
            'Core__fixture' => __DIR__ . '/../src/Core/Fixture',
        ),*/
        'driver' => array(
            // __NAMESPACE__ . '_driver' => array(
                'Core_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                // 'cache' => 'apc',
                // 'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
                'paths' => array(__DIR__ . '/../src/Core/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    // __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                    'Core\Entity' => 'Core_driver'
                ),
            ),
        ),
    ),    
);