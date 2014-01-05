<?php
namespace Core\Service;

/**
 * The GreetingService simply accesses the injected LoggingService without having considered that
 * it already has the LoggingService at its disposal. In this context, it banks on the fact that just this
 * service was made available before it was to be used, regardless of who provided it:
 */

// use Zend\EventManager\EventManagerInterface;


class GreetingService
{
	// private $loggingService;

	public function getGreeting()
	{
		// $this->loggingService->log("getGreeting executed!");

		if(date("H") <= 11)
			return "Good morning, world!";
		else if (date("H") > 11 && date("H") < 17)
			return "Hello, world!";
		else
			return "Good evening, world!";

	}

	/*
	public function setLoggingService($loggingService) 
	{
		return $this->loggingService = $loggingService;
	}


	public function getLoggingService() 
	{
		return $this->loggingService;
	} */

}
