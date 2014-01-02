<?php
namespace Backoffice;

return array(
    'module_layouts' => array(
        'Backoffice' => 'layout/layout',
    ),
    'controllers' => array(
        'invokables' => array(
            'Backoffice\Controller\Dashboard'   => 'Backoffice\Controller\DashboardController',
            'Backoffice\Controller\Affiliate'   => 'Backoffice\Controller\AffiliateController',
            'Backoffice\Controller\Manager'     => 'Backoffice\Controller\ManagerController',
            'Backoffice\Controller\User'        => 'Backoffice\Controller\UserController',
            'Backoffice\Controller\Site'        => 'Backoffice\Controller\SiteController',
        ),
    ),  
    'view_manager' => array(
        'template_path_stack' => array(
            'backoffice' => __DIR__ . '/../view',
        ),
    ),    
);