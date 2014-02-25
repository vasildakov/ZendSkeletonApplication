<?php
// ./module/Authentication/src/Module.php

namespace Authentication;

use Zend\EventManager\EventInterface as Event;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $application         = $e->getApplication();
        $serviceManager      = $application->getServiceManager();
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }


    public function init(ModuleManager $moduleManager)
    {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();

        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            // This event will only be fired when an ActionController under the Authentication namespace is dispatched.
            $e->getTarget()->layout('layout/authentication');
        });
        
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            // var_dump( array(__NAMESPACE__) );
        }, 100);
    }

    public function getConfig()
    {
        $config = array();
        $configFiles = array(
                __DIR__ . '/config/module.config.php', // Defaults
                // __DIR__ . '/config/module.assets.config.php',
            );

        // Merge all module config options
        foreach ($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile);
        }

        return $config;   
    }


    public function getServiceConfig() 
    {
        return array(
            'abstract_factories' => array(),
            'aliases' => array(),
            'factories' => array(
                'Core\Form\User\Signup' => function($serviceManager) {
                    $entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
                    $form = new \Core\Form\User\Signup($entityManager);
                    return $form;
                },
                'SignupForm' => function($serviceManager) {
                    $form = new \Core\Form\UserSignupForm($serviceManager);
                    return $form;
                },
                'Zend\Authentication\AuthenticationService' => function($serviceManager) {
                    return $serviceManager->get('doctrine.authenticationservice.orm_default');  
                },
            ),
            'invokables' => array(
                'loggingService'    => 'Core\Service\LoggingService',
                'greetingService'   => 'Core\Service\GreetingService',
            ),
            'services' => array(),
            'shared' => array(),
        );
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