<?php
// ./module/Backoffice/src/Backoffice/Controller/TestController.php

namespace Backoffice\Controller;

use Zend\ServiceManager\ServiceManager;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

class TestController extends AbstractActionController
{

    public function indexAction()
    {
        // Zend\Di\Di
        // Zend\Di\DependencyInjector
        $greetingService = $this->getServiceLocator()->get('greetingService');
        // var_dump($gs->getGreeting() );

    	$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

    	// employee
    	$employee = new \Core\Entity\Employee();
    	$employee->setUsername("vasildakov");

		$entityManager->persist($employee);
		$entityManager->flush();

		// person
    	$person = new \Core\Entity\Person();
    	$person->setUsername("billgates");

		$entityManager->persist($person);
		$entityManager->flush();


        return new ViewModel(array(
            "greetingService" => $greetingService
        ));
    }




}