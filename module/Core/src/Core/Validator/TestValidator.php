<?php
// http://samsonasik.wordpress.com/2014/02/02/zend-framework-2-utilize-validatormanager-to-work-with-custom-validator-in-zendform/
// http://stackoverflow.com/questions/13476164/zend-framework-2-custom-validators-for-forms

namespace Core\Validator;

use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\Validator\AbstractValidator;

class TestValidator extends AbstractValidator implements ServiceLocatorAwareInterface {

	const EXIST = 'EXIST';


	protected $serviceLocator;

	protected $entityManager;

    protected $messageTemplates = array(
        self::EXIST => "Campaign name '%value%' is already exists"
    );


	public function isValid($value)
    {
    	// just a test
    	$entityManager = $this->getEntityManager();
    	#$campaign = $entityManager->getRepository('Core\Entity\Campaign')->find( array("name" => $value) );
    	$campaign = $entityManager->getRepository('Core\Entity\Campaign')->findOneByName($value);
    	#var_dump($campaign);


        $this->setValue($value);

        // test campaign name
        if ( isset($campaign) and $value == $campaign->getName() ) {
            $this->error(self::EXIST);
            return false;
        }

        return true;
    }    



	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }


    public function getServiceLocator()
    {
        return $this->serviceLocator->getServiceLocator();
    }


    public function getEntityManager() 
    {
    	return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    } 



}