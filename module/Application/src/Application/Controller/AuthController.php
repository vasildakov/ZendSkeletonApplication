<?php
/**
 * Authentication Controller
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{

    public function indexAction()
    {
    	return $this->redirect()->toRoute('login');
    }


    public function loginAction() 
    {
    	$form = new \Core\Form\LoginForm();

    	$request = $this->getRequest();

    	if($request->isPost()) {
    		$form->setData($request->getPost());
    		var_dump($request->getPost());
    	}

    	return new ViewModel(
    		array('form' => $form)
    	);
    }


    public function logoutAction() 
    {
    	// delete session
    }


    public function signupAction() 
    {
    	// just a test with manualy injecting doctrine EntityManager
    	// $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	// $form = new \Core\Form\SignupForm($entityManager);

    	// SignupForm form service factory
    	$form = $this->getServiceLocator()->get('SignupForm');

    	$request = $this->getRequest();
    	if($request->isPost()) {
    		$form->setData($request->getPost());

    		var_dump($request->getPost());
    		
    	}


    	return new ViewModel(array(
    		'form' => $form
    	));
    }

}