<?php
/**
 * This configuration should be put in your module `configs` directory.
 * https://github.com/widmogrod/zf2-assetic-module/blob/master/docs/config.md
 * 
 */
return array(
    'assetic_configuration' => array(
        // Use on production environment
        // 'debug'              => false,
        // 'buildOnRequest'     => false,

        // Use on development environment
        'debug' => true,
        'buildOnRequest' => true,
        'cachePath' => 'data/cache',
        'cacheEnabled' => true,

        // This is optional flag, by default set to `true`.
        // In debug mode allow you to combine all assets to one file.
        // 'combine' => false,

        // this is specific to this project
        'webPath' => realpath('public/assets'),
        'basePath' => 'assets',

        'default' => array(
            'assets' => array(
                '@base_js',
                '@base_css',
            ),
        ),
        
        'routes' => array(
            'home' => array(
                '@base_js',
                '@base_css',
            ),
        ),

        'modules' => array(
            'Application' => array(
                'root_path' => __DIR__ . '/../assets',

                'collections' => array(
                    'base_css' => array(
                        'assets' => array(
                            'css/style.css',
                            'css/bootstrap.min.css'
                        ),
                        'filters' => array(
                            '?CssRewriteFilter' => array(
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ),
                            '?CssMinFilter' => array(
                                'name' => 'Assetic\Filter\CssMinFilter'
                            ),
                        ),
                    ),
                    'base_js' => array(
                        'assets' => array(
                            'js/html5shiv.js',
                            'js/jquery.min.js',
                            'js/bootstrap.min.js',
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            ),
                        ),
                    ),
                    'base_images' => array(
                        'assets' => array(
                            'images/*.png',
                            'images/*.ico',
                        ),
                        'options' => array(
                            'move_raw' => true,
                        )
                    ),
                ),
            ),
        ),
    ),
);
