<?php
namespace Backoffice;

return array(
    'asset_manager' => array(
        'resolver_configs' => array(
            'collections' => array(
            	'js/backoffice.js' => array(
            		 'Backoffice/js/bo.js'
            	)
            ),
            'paths' => array(
                __NAMESPACE__ => __DIR__ . '/../public/assets',
            ),
        ),
    ), 
);