<?php
/**
 * http://framework.zend.com/manual/2.1/en/tutorials/unittesting.html
 * https://zf2.readthedocs.org/en/latest/tutorials/unittesting.html
 * http://devblog.x2k.co.uk/getting-phpunit-working-with-a-zend-framework-2-mvc-application/
 * http://devblog.x2k.co.uk/unit-testing-a-zend-framework-2-controller/
 */

namespace AuthenticationTest\Controller;

use AuthenticationTest\Bootstrap;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Authentication\Controller\IndexController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;

use PHPUnit_Framework_TestCase;

class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;


    protected function setUp()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $this->controller = new IndexController();
        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event      = new MvcEvent();

        $config = $serviceManager->get('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);

        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);

        $this->controller->setServiceLocator(Bootstrap::getServiceManager());
    }



    public function testIndexActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'index');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(TRUE, $response->isRedirect());
        //var_dump($response);

    }



    public function testLoginActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'login');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }    


    public function testSignupActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'signup');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }   


    /* public function testLoginActionWith()
    {
        $this->getRequest()
            ->setMethod('POST')
            ->setPost(new Parameters(array('argument' => 'value')));
        $this->dispatch('/');
    } */


}