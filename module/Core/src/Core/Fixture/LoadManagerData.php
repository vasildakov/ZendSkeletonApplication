<?php
// ./module/Core/src/Core/Fixture/LoadManagerData.php

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

    public function getOrder() 
    {
        return 2;
    }


    public function load(ObjectManager $objectManager)
    {
    	// $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	$managers = $this->getMockManagers();

    	foreach($managers as $row) 
    	{
            $role = $objectManager->find('\Core\Entity\Role', 5);

		    $manager = new \Core\Entity\User();
            $manager->setName($row['name']);
            $manager->setSurname($row['surname']);
		    $manager->setUsername($row['username']);
            $manager->setPassword(123456);
		    $manager->setEmail($row['email']);
		    $manager->setRole( $role );

		    $objectManager->persist($manager);
		    $objectManager->flush();
    	}

    }


    public function getMockManagers() 
    {
        return  array(
            array(
                'username' => 'BillGates',     
                'name' => 'Bill ', 
                'surname' => 'Gates',    
                'email' => "BillGates@gmail.com"
            ),
            array(
                'username' => 'CarlosSlim',     
                'name' => 'Carlos', 
                'surname' => 'Slim Helu',    
                'email' => "CarlosSlim@gmail.com"
            ),
            array(
                'username' => 'VladimirPutin',     
                'name' => 'Vladimir ', 
                'surname' => 'Putin',    
                'email' => "VladimirPutin@gmail.com"
            ),
            array(
                'username' => 'AmancioOrtegaGaona',     
                'name' => 'Amancio', 
                'surname' => 'Ortega Gaona',    
                'email' => "AmancioOrtegaGaona@gmail.com"
            ),
            array(
                'username' => 'WarrenBuffett',     
                'name' => 'Warren', 
                'surname' => 'Buffett',    
                'email' => "WarrenBuffett@gmail.com"
            ),
            array(
                'username' => 'IngvarKamprad',     
                'name' => 'Ingvar', 
                'surname' => 'Kamprad',    
                'email' => "IngvarKamprad@gmail.com"
            ),
            array(
                'username' => 'DavidKoch',     
                'name' => 'David', 
                'surname' => 'Koch',    
                'email' => "DavidKoch@gmail.com"
            ),
            array(
                'username' => 'CharlesKoch',     
                'name' => 'Charles ', 
                'surname' => 'Koch',    
                'email' => "CharlesKoch@gmail.com"
            ),
            array(
                'username' => 'LarryEllison',     
                'name' => 'Larry', 
                'surname' => 'Ellison',    
                'email' => "LarryEllison@gmail.com"
            ),
            array(
                'username' => 'ChristyWalton',     
                'name' => 'Christy ', 
                'surname' => 'Walton',    
                'email' => "ChristyWalton@gmail.com"
            ),
            array(
                'username' => 'SheldonAdelson',     
                'name' => 'Sheldon ', 
                'surname' => 'Adelson',    
                'email' => "SheldonAdelson@gmail.com"
            ),
            array(
                'username' => 'JimWalton',     
                'name' => 'Jim', 
                'surname' => 'Walton',    
                'email' => "JimWalton@gmail.com"
            ),
            array(
                'username' => 'LarryPage',     
                'name' => 'Larry', 
                'surname' => 'Page',    
                'email' => "LarryPage@gmail.com"
            ),
            array(
                'username' => 'SergeyBrin',     
                'name' => 'Sergey', 
                'surname' => 'Brin',    
                'email' => "SergeyBrin@gmail.com"
            ),  
            array(
                'username' => 'MichaelBloomberg',     
                'name' => 'Michael', 
                'surname' => 'Bloomberg',    
                'email' => "MichaelBloomberg@gmail.com"
            ),          
        );
    }
}

