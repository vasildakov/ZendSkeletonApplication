<?php
// ./module/Authentication/src/Authentication/Controller/IndexController.php

/**
 * Authentication Controller
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Authentication\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Session\Container;
use Zend\Session\Storage\SessionStorage;
use Zend\Session\SessionManager;

class IndexController extends AbstractActionController
{

    protected $authservice;


    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;


    public function __construct() 
    {
        $this->module = 'backoffice';
    }


    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getEntityManager() 
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }


    /**
     * Login 
     */
    public function indexAction()
    {
    	return $this->redirect()->toRoute('login');
    }


    /**
     * Login 
     */
    public function loginAction() 
    {

        // see https://github.com/acaciovilela/zf2-DoctrineModule/blob/master/docs/authentication.md
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $adapter = $authService->getAdapter();

        // redirect if user has identity
        if ( $authService->getIdentity() ){
            return $this->redirect()->toRoute($this->module);
        }



    	$form = new \Core\Form\User\Login();
    	$request = $this->getRequest();

    	if($request->isPost()) {

    		$form->setData($request->getPost());

            // set identity and credential
            $adapter->setIdentityValue($request->getPost('email'));
            $adapter->setCredentialValue(md5($request->getPost('password')));
            
            // authenticate
            $authResult = $adapter->authenticate();

            if ($authResult->isValid()) {

                $identity = $authResult->getIdentity();
                $authService->getStorage()->write($identity);

                $loggedUser = $authService->getIdentity();
                #var_dump($loggedUser); 
                #exit();

                #$this->session = new Container('login_session');
                #$this->session->username = $authResult->getIdentity()->getUsername();

                // the redirect must be determined by user role
                return $this->redirect()->toRoute('backoffice');
            }

            $this->flashMessenger()->addMessage('Invalid username or password!' );
    	}


    	return new ViewModel(array(
            'form' => $form,
            'messages'  => $this->flashMessenger()->getMessages(),
        ));
    }



    /**
     * Logout 
     */
    public function logoutAction() 
    {
    	// delete user identity
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

        $user = $authService->getIdentity();

        #var_dump( $user->getRole()->getName() ); exit();
        $authService->clearIdentity();
        return $this->redirect()->toRoute('login');
        #var_dump($authService->getIdentity()); exit();
    }


    /**
     * Signup 
     */
    public function signupAction() 
    {

    	$form = $this->getServiceLocator()->get('SignupForm');
    	$request = $this->getRequest();

    	if($request->isPost()) {

            $user = new \Core\Entity\User;

            // $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $role = $this->getEntityManager()->find('Core\Entity\Role', 1);
                // $user->populate($form->getData());
                $user->setUsername( $request->getPost('username'));
                $user->setPassword( $request->getPost('password'));
                $user->setEmail( $request->getPost('email'));
                $user->setStatus(\Core\Entity\User::STATUS_PENDING);
                $user->setRole($role);

                $this->getEntityManager()->persist($user);
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('backoffice/user'); 

                // var_dump( $request->getPost() );
                // var_dump($user);
            } 
            else {
                $messages = $form->getMessages();
                var_dump($messages);
            }
    	}


    	return new ViewModel(array(
    		'form' => $form
    	));
    }



    public function getAuthService() 
    {
        if (! $this->authservice) {
            // $this->authservice = $this->getServiceLocator()->get('AuthService'); // module.config.php
            $this->authservice = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        }
        return $this->authservice;
    }
}