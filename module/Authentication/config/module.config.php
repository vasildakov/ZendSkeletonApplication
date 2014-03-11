<?php
namespace Authentication;

return array(   
    'module_layouts' => array(
        'Authentication' => 'layout/layout',
    ),
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Authentication\Controller',
                        'controller'    => 'Index',
                        'action'        => 'login',
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Authentication\Controller',
                        'controller'    => 'Index',
                        'action'        => 'logout',
                    ),
                ),
            ),
            'signup' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/signup',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Authentication\Controller',
                        'controller'    => 'Index',
                        'action'        => 'signup',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Authentication\Controller\Index'  => 'Authentication\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
);