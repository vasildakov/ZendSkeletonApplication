<?php
// ./module/Backoffice/src/Module.php

namespace Backoffice;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{

   // set backoffice template
   public function init(ModuleManager $moduleManager)
   {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controller->layout('layout/backoffice');
        }, 100);
    }


    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }


    public function getConfig()
    {
        // return include __DIR__ . '/config/module.config.php';
        $config = array();
        $configFiles = array(
                __DIR__ . '/config/module.config.php', // Defaults
                __DIR__ . '/config/module.config.routes.php', // Routes
            );

        // Merge all module config options
        foreach ($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile);
        }

        return $config;   
    }



    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
   
}
