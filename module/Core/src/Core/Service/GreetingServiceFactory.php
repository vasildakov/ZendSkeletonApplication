<?php
namespace Core\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GreetingServiceFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{

		$greetingService = new GreetingService();
		$greetingService->setEventManager($serviceLocator->get('eventManager'));
		$greetingService->getEventManager()->attach(
			'getGreeting',
			function($e) use($serviceLocator) {
				$serviceLocator
				->get('loggingService')
				->onGetGreeting($e);
			});

		return $greetingService;



		/* $di = new \Zend\Di\Di();
		$di->configure(new \Zend\Di\Config(array(
			'definition' => array(
				'class' => array(
					'Core\Service\GreetingService' => array(
						'setLoggingService' => array(
							'required' => true
						)
					)
				)
			),
			'instance' => array(
				'preferences' => array(
					'Core\Service\LoggingServiceInterface' => 'Core\Service\LoggingService'
				)
			)
		)));

		$greetingService = $di->get('Core\Service\GreetingService');
		return $greetingService; */

	}
}
