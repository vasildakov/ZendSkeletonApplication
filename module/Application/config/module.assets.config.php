<?php
// http://www.razko.nl/blog/2013/01/21/managing-assets-in-zend-framework-2/

namespace Application;

return array(
    'asset_manager' => array(
        'resolver_configs' => array(
            'collections' => array(
            	'js/application.js' => array(
            		 'Application/js/bo.js'
            	)
            ),
            'paths' => array(
            	__NAMESPACE__ => __DIR__ . '/../public/assets',
            ),
	        'caching' => array(
	            'default' => array(
	                'cache'     => 'Apc',
	            ),
	        ),
        ),

    ),
);