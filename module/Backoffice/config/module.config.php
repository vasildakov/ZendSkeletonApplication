<?php
namespace Backoffice;

return array(
    'controllers' => array(
        'invokables' => array(
            'Backoffice\Controller\Affiliate'   => 'Backoffice\Controller\AffiliateController',
            'Backoffice\Controller\Country'     => 'Backoffice\Controller\CountryController',
            'Backoffice\Controller\Currency'    => 'Backoffice\Controller\CurrencyController',
            'Backoffice\Controller\Dashboard'   => 'Backoffice\Controller\DashboardController',
            'Backoffice\Controller\Language'    => 'Backoffice\Controller\LanguageController',
            'Backoffice\Controller\Manager'     => 'Backoffice\Controller\ManagerController',
            'Backoffice\Controller\Site'        => 'Backoffice\Controller\SiteController',
            'Backoffice\Controller\Test'        => 'Backoffice\Controller\TestController',
            'Backoffice\Controller\User'        => 'Backoffice\Controller\UserController',
            
        ),
    ),  
    'view_manager' => array(
        'template_path_stack' => array(
            'backoffice' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            //'backoffice/layout' => __DIR__ . '/../view/layout/layout.phtml',
        ),
    ),    
);