<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Api\Controller\CampaignRest' => 'Api\Controller\CampaignRestController',
            ),
        ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'api' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/campaign[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                        ),
                    'defaults' => array(
                        'controller' => 'Api\Controller\CampaignRest',
                        ),
                    ),
                ),
            ),
        ),

    'view_manager' => array(
        'template_path_stack' => array(
            // 'Api' => __DIR__ . '/../view',
            ),
        ),
     'view_manager' => array( //Add this config
        'strategies' => array(
            'ViewJsonStrategy',
            ),
        ),
     );