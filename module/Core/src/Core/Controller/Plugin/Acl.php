<?php

namespace Core\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin,
    Zend\Session\Container as Container,
    Zend\Permissions\Acl\Acl as ZendAcl,
    Zend\Permissions\Acl\Role\GenericRole as Role,
    Zend\Permissions\Acl\Resource\GenericResource as Resource;

// this should be Core\Controller\Plugin\Acl
class Acl extends AbstractPlugin
{

    protected $sesscontainer;
 
    
    
    public function hasIdentity() 
    {
        return $this->getAuthService()->hasIdentity();
    }
    
    
    public function getIdentity() 
    {
        return $this->getAuthService()->getIdentity();
    }
    
    
    
    public function getAuthAdapter()
    {
        return $this->getAuthService()->getAdapter();
    }     
    
    
    public function getAuthService() 
    {
        return $this->getServiceLocator()->get('AuthService');
    }
    
    
    private function getSessContainer()
    {
        if (!$this->sesscontainer) {
            $this->sesscontainer = new Container('container');
        }
        return $this->sesscontainer;
    }
    
    
    public function testAcl($e)
    {   
        #var_dump($e); exit();

        $acl = new ZendAcl();

        // taken from the db
        $acl->addRole(new Role('anonymous'));

        $acl->addResource(new Resource('Application'));
        $acl->addResource(new Resource('Backoffice'));

        $acl->deny('anonymous', 'Application', 'view');
        $acl->allow('anonymous', 'Application', 'login'); 

        $acl->allow('anonymous', 'Backoffice'); 

        if( !$acl->isAllowed('anonymous', 'Application' , 'login') )
        {
            exit("deny");
        }

        if( !$acl->isAllowed('anonymous', 'Backoffice') )
        {
            exit("deny");
        }


        $controller = $e->getTarget();
        $controllerClass = get_class($controller);
        #var_dump($controllerClass); // OK

    }
    

    // this should be doAcl or checkAcl
    public function doAuthorization($e) 
    {
        // plugin http://www.resourcemode.com/me/?p=327
        // see http://samsonasik.wordpress.com/2012/08/23/zend-framework-2-controllerpluginmanager-append-controller-pluginto-all-controller/
        $acl = new ZendAcl();
        
        $acl->addRole(new Role('anonymous'));
        $acl->addRole(new Role('user'),  'anonymous');
        $acl->addRole(new Role('admin'), 'user');  
        
        $acl->addResource(new Resource('Application'));
        $acl->addResource(new Resource('Login'));
        
        $acl->deny('anonymous', 'Application', 'view');
        $acl->allow('anonymous', 'Login', 'view');     
        
        $acl->allow('user', array('Application'), array('view'));
        $acl->allow('admin', array('Application'), array('publish', 'edit'));        

        $controller = $e->getTarget();
        $controllerClass = get_class($controller);
        $namespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
        
        $role = (!$this->getSessContainer()->role ) ? 'anonymous' : $this->getSessContainer()->role;
        
        if ( ! $acl->isAllowed($role, $namespace, 'view')){
            $router = $e->getRouter();
            $url    = $router->assemble(array(), array('name' => 'login/auth'));
            $response = $e->getResponse();
            $response->setStatusCode(302);        
            $response->getHeaders()->addHeaderLine('Location', $url);
            $e->stopPropagation();
        }
        
    }
    
}
