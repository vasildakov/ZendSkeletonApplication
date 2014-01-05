<?php

namespace Core;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\PluginManager;
use Zend\EventManager\EventInterface;

use Core\View\Helper\AbsoluteUrl;

class Module {


    public function onBootstrap(EventInterface $e)
    {
        $application = $e->getTarget();
        $serviceManager = $application->getServiceManager();
        $sharedManager = $application->getEventManager()->getSharedManager();
        
        $eventManager = $e->getApplication()->getEventManager();
        
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

    }


    public function getConfig()
    {
        $config = array();
        $configFiles = array(
                __DIR__ . '/config/module.config.php', // Defaults
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
                'Core\Form\SignupForm' => function($serviceManager) {
                    $entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
                    $form = new \Core\Form\SignupForm($entityManager);
                    return $form;
                },
                'Zend\Authentication\AuthenticationService' => function($serviceManager) {
                    return $serviceManager->get('doctrine.authenticationservice.orm_default');  
                },
            ),
            'invokables' => array(
                'loggingService'  => 'Core\Service\LoggingService',
                'greetingService' => 'Core\Service\GreetingService',
            ),
            'services' => array(),
            'shared' => array(),
        );
    }


    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                // the array key here is the name you will call the view helper by in your view scripts
                'absoluteUrl' => function($serviceManager) {
                    $locator = $serviceManager->getServiceLocator(); // $sm is the view helper manager, so we need to fetch the main service manager
                    return new AbsoluteUrl($locator->get('Request'));
                },
            ),
        );
    }


    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ),                
            ),          
        );
    } 



}