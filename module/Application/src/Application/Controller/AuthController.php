<?php
// ./module/Application/src/Application/Controller/AuthController.php

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

    	if($request->isPost()) 
        {
    		$form->setData($request->getPost());

            // see https://github.com/acaciovilela/zf2-DoctrineModule/blob/master/docs/authentication.md
            $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
            $adapter = $authService->getAdapter();

            $adapter->setIdentityValue($request->getPost('email'));
            $adapter->setCredentialValue(md5($request->getPost('password')));
            
            $authResult = $adapter->authenticate();
            var_dump($authResult);
    	}

    	return new ViewModel(array(
            'form' => $form
        ));
    }



    public function logoutAction() 
    {
    	// delete session
    }


    public function signupAction() 
    {
    	// (1) injecting doctrine EntityManager in form constructor
        // $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        // $form = new \Core\Form\SignupForm($entityManager);


    	// (2) get form service factory
    	$form = $this->getServiceLocator()->get('Core\Form\SignupForm');
        

    	$request = $this->getRequest();

    	if($request->isPost()) 
        {
    		$form->setData($request->getPost());

            if ($form->isValid()) 
            {
                $validData = $request->getPost();
                var_dump($validData);
            } 
            else 
            {
                $messages = $form->getMessages();
                var_dump($messages);
            }
    	}


    	return new ViewModel(array(
    		'form' => $form
    	));
    }

}