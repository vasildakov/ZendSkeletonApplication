<?php

namespace Core\Form\Campaign;
 
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Core\Form\Campaign\TestForm;
 
class TestFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = $serviceLocator->getServiceLocator();
        $form = new TestForm($service->get('ValidatorManager'));
         
        return $form;
    }
}