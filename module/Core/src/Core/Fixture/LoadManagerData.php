<?php
namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 * See: https://github.com/doctrine/data-fixtures
 */
class LoadManagerData implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $objectManager)
    {
    	// $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	$managers = array(
	    		array('username' => 'manager1',   'email' => "manager1@company.com"),
                array('username' => 'manager2',   'email' => "manager2@company.com"),
                array('username' => 'manager3',   'email' => "manager3@company.com"),
    		);

    	foreach($managers as $row) 
    	{

            $role = $objectManager->find('\Core\Entity\Role', 5);

		    $manager = new \Core\Entity\Manager();
		    $manager->setUsername($row['username']);
		    $manager->setEmail($row['email']);
		    $manager->setRole( $role );

		    $objectManager->persist($manager);
		    $objectManager->flush();
    	}

    }


    public function getOrder() 
    {
        return 2;
    }

}