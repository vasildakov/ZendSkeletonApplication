<?php
/**
 * Index Controller
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
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


    public function getEntityManager() 
    {
    	return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
}
