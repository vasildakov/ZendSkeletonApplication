<?php
/**
 * @author Vasil Dakov <vasildakov@gmail.com>
*/

namespace CoreTest\Repository;

use CoreTest\Bootstrap;
use PHPUnit_Framework_TestCase;

class UserRepositoryFunctionalTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
		$serviceManager = Bootstrap::getServiceManager();
		$entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
    }


	public function testUserRepositoryFindRecent() 
	{
		$entityManager = Bootstrap::$entityManager;
		$users = $entityManager->getRepository('Core\Entity\User')->findRecent(7);

		$this->assertCount(7, $users);

	}


	public function testUserRepositoryFindByRoleManager() 
	{
		$entityManager = Bootstrap::$entityManager;
		$role = $entityManager->find('Core\Entity\Role', 5);
		$users = $entityManager->getRepository('Core\Entity\User')->findByRole($role);

		$this->assertCount(15, $users);		
	}


	public function testUserRepositoryFindByRoleAffiliate() 
	{
		$entityManager = Bootstrap::$entityManager;
		$role = $entityManager->find('Core\Entity\Role', 6);
		$users = $entityManager->getRepository('Core\Entity\User')->findByRole($role);

		$this->assertCount(32, $users);		
	}





    // test queries against a real database
    public function testUserEntity()
    {
    	$entityManager = Bootstrap::$entityManager;
    	$user = $entityManager->getRepository('Core\Entity\User')->findOneById(1);

        $this->assertEquals('TheRing', $user->getUsername());
        $this->assertEquals(6, $user->getRole()->getId());
        $this->assertEquals(40, $user->getLanguage()->getId());
        $this->assertEquals(TRUE, $user->isActive());
    }


    public function testSearchByRole() 
    {
    	$entityManager = Bootstrap::$entityManager;
    	$role = $entityManager->find('Core\Entity\Role', 5);
		$users = $entityManager->getRepository('Core\Entity\User')->findBy( array('role' => $role));

		$this->assertCount(15, $users);

    }


    public function testSearchByLanguageName() 
    {
    	$this->assertCount(1, array(1) );
    }


   /**
  	* http://symfony.com/doc/current/cookbook/testing/doctrine.html
  	*/
    protected function tearDown()
    {
        parent::tearDown();
    }

}