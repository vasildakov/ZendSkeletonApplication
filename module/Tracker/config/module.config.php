<?php
namespace Tracker;

return array(   
    'router' => array(
        'routes' => array(
            'tracker' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/tracker',
                    'defaults' => array(
                        'controller' => 'Tracker\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Tracker\Controller\Index' => 'Tracker\Controller\IndexController',
        ),
    ),
);