<?php
// http://michaelthessel.com/injecting-zf2-service-manager-into-doctrine-entities/
// http://docs.doctrine-project.org/en/2.0.x/reference/events.html#postload

namespace Core\Entity;

use Zend\ServiceManager\ServiceManager;
 
class ServiceManagerListener
{
    protected $sm;
 
    public function __construct(ServiceManager $sm)
    {
        $this->sm = $sm;
    }
 
    public function postLoad($eventArgs)
    {
        $entity = $eventArgs->getEntity();
        $class = new \ReflectionClass($entity);
        if ($class->implementsInterface('Zend\ServiceManager\ServiceLocatorAwareInterface')) {
            $entity->setServiceLocator($this->sm);
        }
    }
}