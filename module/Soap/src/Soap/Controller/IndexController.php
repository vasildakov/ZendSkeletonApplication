<?php

namespace Soap\Controller;

use Zend\Soap\Client;
use Zend\Soap\Server;
use Zend\Soap\AutoDiscover;
use Zend\Mvc\Controller\AbstractActionController;

use Soap\Service\TestClass;

class IndexController extends AbstractActionController
{


    public function init()
    {
        /* 
         * http://framework.zend.com/manual/2.2/en/modules/zend.soap.auto-discovery.html 
         * https://github.com/zendframework/zf2/blob/master/library/Zend/Soap/AutoDiscover.php
         */
    }


    public function indexAction()
    {
        $obj = new TestClass();

        $autodiscover = new \Zend\Soap\AutoDiscover();
        $autodiscover->setClass($obj)
                     ->setUri('http://localhost/server.php')
                     ->setServiceName('TestSoapService');

        $wsdl = $autodiscover->generate();
        $wsdl->dump( getcwd(). "/data/service.wsdl");

        $xml = $autodiscover->toXml();

        $response = $this->getResponse();
        $response->getHeaders()
                 ->addHeaders(array('Content-Type' => 'text/xml;charset=UTF-8'));

        return $response->setContent($xml);
    }


    public function soapAction()
    {

        // initialize server and set URI
        $server = new Server(null, array('uri' => 'http://localhost/soap/wsdl'));

        // set SOAP service class
        $server->setClass('servicesAPI');

        // handle request
        $server->handle();

        return $this->getResponse();
    }


    public function wsdlAction()
    {

        // set up WSDL auto-discovery
        $wsdl = new AutoDiscover();

        // attach SOAP service class
        $wsdl->setClass('servicesAPI');

        // set SOAP action URI
        $wsdl->setUri('http://localhost/soap/soap');

        // handle request
        $wsdl->handle();
        return $this->getResponse();
    }


    public function clientAction()
    {
        $url = 'http://localhost/soap/wsdl';
        $client = new Client($url);

        print_r($client->getProducts());
        return $this->getResponse();
    }


}
