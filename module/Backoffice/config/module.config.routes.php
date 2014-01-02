<?php

namespace Backoffice;

return array(
    'router' => array(
        'routes' => array(         
            'backoffice' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/backoffice', // route to /backoffice, [/] adds a trailing slash to the url
                    'defaults' => array(
                        //'__NAMESPACE__' => 'Backoffice\Controller',
                        'controller' => 'Backoffice\Controller\Dashboard',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'user' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/user[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\User',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'manager' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/manager[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\Manager',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'affiliate' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/affiliate[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\Affiliate',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'site' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/site[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\Site',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ) 
);