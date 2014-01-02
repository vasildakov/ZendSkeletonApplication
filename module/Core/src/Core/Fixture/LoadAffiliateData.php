<?php
namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 * See: https://github.com/doctrine/data-fixtures
 */
class LoadAffiliateData implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	// $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	$affiliates = array(
	    		array('username' => 'ivan', 'first_name' => 'Ivan',   'email' => "ivan@gmail.com"),
	    		array('username' => 'dragan', 'first_name' => 'Dragan', 'email' => "dragan@gmail.com"), 
	    		array('username' => 'petkan', 'first_name' => 'Petkan', 'email' => "petkan@gmail.com"),
                array('username' => 'john', 'first_name' => 'John', 'email' => "john@gmail.com"),
                array('username' => 'bill', 'first_name' => 'Bill', 'email' => "bill@gmail.com"),
                array('username' => 'matt', 'first_name' => 'Matt', 'email' => "matt@gmail.com"),
    		);

    	foreach($affiliates as $row) 
    	{

            $role = $manager->find('\Core\Entity\Role', 6);

		    $affiliate = new \Core\Entity\Affiliate();
		    $affiliate->setUsername($row['username']);
            $affiliate->setFirstName($row['first_name']);
		    $affiliate->setEmail($row['email']);
		    $affiliate->setRole( $role );

		    $manager->persist($affiliate);
		    $manager->flush();
    	}

    }


    public function getOrder() 
    {
        return 2;
    }

}