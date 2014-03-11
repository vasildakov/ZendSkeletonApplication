<?php
/**
 * http://framework.zend.com/manual/2.0/en/modules/zend.soap.auto-discovery.html
 */

namespace Soap\Controller;

use Zend\Soap\Client;
use Zend\Soap\Server;
use Zend\Soap\AutoDiscover;
use Zend\Mvc\Controller\AbstractActionController;

use Zend\Http\Request;
use Zend\Http\Response;

use Soap\Service\TestClass;

class IndexController extends AbstractActionController
{


    public function init()
    {
        /* 
         * http://framework.zend.com/manual/2.2/en/modules/zend.soap.auto-discovery.html 
         * https://github.com/zendframework/zf2/blob/master/library/Zend/Soap/AutoDiscover.php
         * https://gist.github.com/weierophinney/8959426
         */
    }


    public function indexAction() 
    {
        $obj = new \Soap\Service\TestClass;

        if (isset($_GET['wsdl'])) 
        {
            $autodiscover = new \Zend\Soap\AutoDiscover;
            $autodiscover->setClass($obj)
                         ->setUri('http://zend-skeleton-doctrine2/soap')
                         ->setServiceName('TestService');

            $xml = $autodiscover->toXml();
                         
            $response = $this->getResponse();
            $response->getHeaders()->addHeaders(array('Content-Type' => 'text/xml;charset=UTF-8'));
            return $response->setContent($xml);
        } 
        else {
            // pointing to the current file here
            $soap = new \Zend\Soap\Server("http://zend-skeleton-doctrine2/soap?wsdl");
            $soap->setClass($obj);
            $soap->handle();
        }

    }



    public function _indexAction()
    {
        $obj = new TestClass();
        $soap = new \Zend\Soap\Server("http://zend-skeleton-doctrine2/soap?wsdl");
        $soap->setObject($obj);
        $soap->handle();



        #$response = new Response();
        #$response->setStatusCode(Response::STATUS_CODE_200);
        #return $response->setContent("indexAction");


        /* $obj = new TestClass();
        $autodiscover = new \Zend\Soap\AutoDiscover();
        $autodiscover->setClass($obj)
                     ->setUri('http://zend-skeleton-doctrine2/soap?wsdl')
                     ->setServiceName('TestSoapService');

        $wsdl = $autodiscover->generate();
        $wsdl->dump( getcwd(). "/data/service.wsdl");
        $xml = $autodiscover->toXml();
        $response = $this->getResponse();
        $response->getHeaders()->addHeaders(array('Content-Type' => 'text/xml;charset=UTF-8'));
        return $response->setContent($xml); */
    }



    public function soapAction()
    {
        #$response = new Response();
        #$response->setStatusCode(Response::STATUS_CODE_200);
        #return $response->setContent("soapAction");

        $obj = new TestClass();

        $autodiscover = new \Zend\Soap\AutoDiscover();
        $autodiscover->setObject($obj)
                     ->setUri('http://zend-skeleton-doctrine2/soap')
                     ->setServiceName('TestSoapService');

        $wsdl = $autodiscover->generate();

        $xml = $autodiscover->toXml();

        $response = $this->getResponse();
        $response->getHeaders()->addHeaders(array('Content-Type' => 'text/xml;charset=utf-8'));
        #$response->getHeaders()->addHeaders(array('Content-Type' => 'text/xml'));
        return $response->setContent($xml);

    }




    public function wsdlAction()
    {
        $obj = new TestClass();

        // set up WSDL auto-discovery
        $wsdl = new \Zend\Soap\AutoDiscover();

        // attach SOAP service class
        $wsdl->setClass($obj);

        // set SOAP action URI
        $wsdl->setUri('http://zend-skeleton-doctrine2/soap/index');

        // handle request
        $wsdl->handle();
        return $this->getResponse();
    }


    public function clientAction()
    {
        $url = 'http://zend-skeleton-doctrine2/soap/wsdl';
        $client = new \Zend\Soap\Client($url);

        //print_r($client->getProducts());
        return $this->getResponse();
    }


}
