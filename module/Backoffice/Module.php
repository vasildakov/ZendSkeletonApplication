<?php
// ./module/Backoffice/src/Module.php

namespace Backoffice;

use Zend\EventManager\EventInterface as Event;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{

   // set backoffice template
   /* public function init(ModuleManager $moduleManager)
   {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controller->layout('layout/backoffice');
        }, 100);
    } */

    public function init(ModuleManager $moduleManager)
    {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();

        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            $e->getTarget()->layout('layout/backoffice');
        });

        // There’s really no such thing as “module-specific” anything in ZF2, 
        // so what we’re really talking about is the topmost namespace of the controller being dispatched.
        // This event will only be fired under the Backoffice namespace.
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            // var_dump( array(__NAMESPACE__) );
        }, 100);
    }


    public function onBootstrap(MvcEvent $e)
    {
        $application         = $e->getApplication();
        $serviceManager      = $application->getServiceManager();
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        /* $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractController', 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
        }, 100); */

        
        // ROUTE MATCH
        $router = $serviceManager->get('router');
        $request = $serviceManager->get('request');
        $routeMatch = $router->match($request);
        #var_dump($routeMatch->getParams() );
        #if (!is_null($routeMatch)) var_dump($routeMatch->getMatchedRouteName());
        // ROUTE MATCH

        // AUTH
        $authService = $serviceManager->get('Zend\Authentication\AuthenticationService');
        $user = $authService->getIdentity();
        #var_dump($authService->hasIdentity());
        // AUTH

        $controller = $e->getTarget();
        $controllerClass = get_class($controller);
        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));



        

    }


    public function getConfig()
    {
        // return include __DIR__ . '/config/module.config.php';
        $config = array();
        $configFiles = array(
                __DIR__ . '/config/module.config.php', // Defaults
                __DIR__ . '/config/module.config.routes.php', // Routes
                __DIR__ . '/config/module.assets.config.php', // Assets
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
