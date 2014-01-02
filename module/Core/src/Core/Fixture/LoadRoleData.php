<?php
namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 * See: https://github.com/doctrine/data-fixtures
 */
class LoadRoleData implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	// $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	
    	$roles = array(
	    		array('id' => 1, 'name' => 'Administrator'),
	    		array('id' => 2, 'name' => 'Advertiser'),
	    		array('id' => 3, 'name' => 'Developer'),
	    		array('id' => 4, 'name' => 'Accountant'),
	    		array('id' => 5, 'name' => 'Manager'),
	    		array('id' => 6, 'name' => 'Affiliate'),
    		);

    	foreach($roles as $row) {
		    $role = new \Core\Entity\Role();
		    $role->setName($row['name']);

		    $manager->persist($role);
		    $manager->flush();
    	}

    }

    public function getOrder() 
    {
    	return 1;
    }
}