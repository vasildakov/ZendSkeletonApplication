<?php

namespace Core;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\PluginManager;
use Zend\EventManager\EventInterface;

use Core\View\Helper\AbsoluteUrl;
use Core\View\Helper\RenderForm;

class Module {


    public function onBootstrap(EventInterface $e)
    {
        #var_dump('onBootstrap');

        $application = $e->getTarget();
        #var_dump($application); exit();

        $serviceManager = $application->getServiceManager();
        $sharedManager  = $application->getEventManager()->getSharedManager();
        #var_dump($sharedManager); exit();

        $eventManager   = $e->getApplication()->getEventManager();
        #var_dump($eventManager); exit();

        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        // router, request and matched route
        $router  = $serviceManager->get('router');
        $request = $serviceManager->get('request');
        $matchedRoute = $router->match($request);
        #var_dump($matchedRoute);


        $sharedManager->attach('Zend\Mvc\Controller\AbstractActionController','dispatch',
            function($e) use ($serviceManager) {
                $serviceManager->get('ControllerPluginManager')->get('Acl')->testAcl($e); //pass to the plugin...   
            },2
        );         


        // Doctrine’s event manager offers a postLoad event which is called after the entity has been loaded.
        // see: http://michaelthessel.com/injecting-zf2-service-manager-into-doctrine-entities/
        // see: http://docs.doctrine-project.org/en/2.0.x/reference/events.html
        $entityManager = $serviceManager->get('doctrine.entitymanager.orm_default');
        $evm = $entityManager->getEventManager();
        $evm->addEventListener(array(\Doctrine\ORM\Events::postLoad), new \Core\Entity\ServiceManagerListener($serviceManager));

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
                'Zend\Authentication\AuthenticationService' => function($serviceManager) {
                    return $serviceManager->get('doctrine.authenticationservice.orm_default'); 
                },
                'logger' => function() {
                    $logger = new \Zend\Log\Logger();
                    $logger->addWriter(new \Zend\Log\Writer\Stream(
                        getcwd(). '/data/application.log'
                    ));
                    return $logger;
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


    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                // the array key here is the name you will call the view helper by in your view scripts
                'absoluteUrl' => function($serviceManager) {
                    $locator = $serviceManager->getServiceLocator(); // $sm is the view helper manager, so we need to fetch the main service manager
                    
                    return new \Core\View\Helper\AbsoluteUrl($locator->get('Request'));
                },
                'renderForm'  => function($serviceManager) {
                    $locator = $serviceManager->getServiceLocator();
                    $form = new \Core\Form\User\Search();
                    $request = $locator->get('Request');
                    
                    return new RenderForm($form, $request);
                },
                'testHelper' => function($serviceManager) {
                    $entityManager = $serviceManager->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                    $helper = new \Core\View\Helper\TestHelper($entityManager);
                    return $helper;
                }
            ),
            'invokables' => array(
                'FormElementErrors' => 'Core\Form\View\Helper\FormElementErrors'
            ),
        );
    }

    public function getControllerPluginConfig() 
    {
        return array(
            'invokables' => array(
                'Acl' => 'Core\Controller\Plugin\Acl'
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