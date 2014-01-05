<?php
// ./module/Backoffice/src/Backoffice/Controller/DashboardController.php

/**
 * Dashboard Controller
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DashboardController extends AbstractActionController
{
    public function indexAction()
    {
    	/*
		$entityManager = $this->getEntityManager();
	    $user = new \Core\Entity\User();
	    $user->setUsername('Vasil Dakov')->setEmail("vasildakov@gmail.com");
	    $entityManager->persist($user);
	    $entityManager->flush();
	    die(var_dump($user->getId()));
		*/
	    return new ViewModel();
    }
}
