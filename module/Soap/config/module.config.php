<?php
namespace Soap;

return array(
    'controllers' => array(
        'invokables' => array(
            'Soap\Controller\Index' => 'Soap\Controller\IndexController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'soap' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/soap/index[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Soap\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            // 'album' => __DIR__ . '/../view',
        ),
    ),
);
