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
                    'campaign' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/campaign[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\Campaign',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'country' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/country[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\Country',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'currency' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/currency[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\Currency',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'language' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/language[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\Language',
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
                    'test' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/test[/:action][/:id]', // route to /backoffice/user...
                            'defaults' => array(
                                //'__NAMESPACE__' => 'Backoffice\Controller',
                                'controller' => 'Backoffice\Controller\Test',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ) 
);