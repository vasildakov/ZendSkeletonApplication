<?php
// ./module/Core/src/Core/Fixture/LoadAffiliateData.php

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
    public function getOrder() 
    {
        return 2;
    }

    public function load(ObjectManager $objectManager)
    {
    	// $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	$affiliates = $this->getMockAffiliates();

    	foreach($affiliates as $row) 
    	{

            $role = $objectManager->find('\Core\Entity\Role', 6);

		    $affiliate = new \Core\Entity\User();
		    $affiliate->setUsername($row['username']);
            $affiliate->setPassword(123456);
            $affiliate->setName($row['name']);
            $affiliate->setSurname($row['surname']);
		    $affiliate->setEmail( strtolower($row['email']) );

		    $affiliate->setRole( $role );

		    $objectManager->persist($affiliate);
		    $objectManager->flush();
    	}

    }


    public function getMockAffiliates() 
    {
        return  array(
                /* 
                array('username' => 'aiken',     'name' => 'Aiken',    'email' => "aiken@gmail.com"),
                array('username' => 'albert',    'name' => 'Albert',   'email' => "albert@gmail.com"), 
                array('username' => 'alfred',    'name' => 'Alfred',   'email' => "alfred@gmail.com"),
                array('username' => 'baldwin',   'name' => 'Baldwin',  'email' => "baldwin@gmail.com"),
                array('username' => 'barrett',   'name' => 'Barrett',  'email' => "barrett@gmail.com"),
                array('username' => 'barry',     'name' => 'Barry',    'email' => "barry@gmail.com"), 
                */

                array(
                    'username' => 'TheRing',     
                    'name' => 'Alan', 
                    'surname' => 'Howard',    
                    'email' => "TheRing@gmail.com"
                ),
                array(
                    'username' => 'Frodo',     
                    'name' => 'Elijah',
                    'surname' => ' Wood',    
                    'email' => "Frodo@gmail.com"
                ),
                array(
                    'username' => 'Proudfoot',     
                    'name' => 'Noel',
                    'surname' => ' Appleby',    
                    'email' => "Frodo@gmail.com"
                ),
                array(
                    'username' => 'Samwise',     
                    'name' => 'Sean', 
                    'surname' => ' Astin',    
                    'email' => "Samwise@gmail.com"
                    ),

                array(
                    'username' => 'Sauron',     
                    'name' => 'Sala', 
                    'surname' => ' Baker',    
                    'email' => "Sauron@gmail.com"
                    ),
                array(
                    'username' => 'Boromir',     
                    'name' => 'Sean', 
                    'surname' => ' Bean',    
                    'email' => "Boromir@gmail.com"
                    ),
                array(
                    'username' => 'Galadriel',     
                    'name' => 'Cate', 
                    'surname' => ' Blanchett',    
                    'email' => "Galadriel@gmail.com"
                    ),
                array(
                    'username' => 'Legolas',     
                    'name' => 'Orlando', 
                    'surname' => ' Bloom',    
                    'email' => "Legolas@gmail.com"
                    ),
                array(
                    'username' => 'Pippin',     
                    'name' => 'Billy', 
                    'surname' => ' Boyd',    
                    'email' => "Pippin@gmail.com"
                    ),

                array(
                    'username' => 'Celeborn',     
                    'name' => 'Marton',
                    'surname' => 'Csokas',    
                    'email' => "Celeborn@gmail.com"
                    ),
                array(
                    'username' => 'MrsProudfoot',     
                    'name' => 'Megan', 
                    'surname' => ' Edwards',    
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'GondorianArch',     
                    'name' => 'Michael', 
                    'surname' => ' Elsworth',    
                    'email' => "GondorianArch@gmail.com"
                    ),
                array(
                    'username' => 'GilGalad',     
                    'name' => 'Mark', 
                    'surname' => ' Ferguson',    
                    'email' => "GilGalad@gmail.com"
                    ),
                array(
                    'username' => 'BilboBaggins',     
                    'name' => 'Ian', 
                    'surname' => ' Holm',    
                    'email' => "BilboBaggins@gmail.com"
                    ),
                array(
                    'username' => 'Saruman',     
                    'name' => 'Christopher', 
                    'surname' => ' Lee',    
                    'email' => "Saruman@gmail.com"),

                array(
                    'username' => 'Lurtz',     
                    'name' => 'Lawrence', 
                    'surname' => ' Makoare',    
                    'email' => "Lurtz@gmail.com"
                    ),
                array(
                    'username' => 'Gollum',     
                    'name' => 'Andy', 
                    'surname' => ' Serkis',    
                    'email' => "Gollum@gmail.com"),
                array(
                    'username' => 'WitchKing',     
                    'name' => 'Brent', 
                    'surname' => ' McIntyre',    
                    'email' => "WitchKing@gmail.com"),
                array(
                    'username' => 'GandalfTheGrey',     
                    'name' => 'Ian', 
                    'surname' => ' McKellen',    
                    'email' => "GandalfTheGrey@gmail.com"),
                array(
                    'username' => 'Elendil',     
                    'name' => 'Peter', 
                    'surname' => ' McKenzie',    
                    'email' => "Elendil@gmail.com"),
                array(
                    'username' => 'RoseCotton',     
                    'name' => 'Sarah', 
                    'surname' => ' McLeod',    
                    'email' => "RoseCotton@gmail.com"),
                array(
                    'username' => 'MeriadocBrandybuck',     
                    'name' => 'Dominic', 
                    'surname' => ' Monaghan',    
                    'email' => "MeriadocBrandybuck@gmail.com"),
                array(
                    'username' => 'Aragorn',     
                    'name' => 'Viggo', 
                    'surname' => ' Mortensen',    
                    'email' => "Aragorn@gmail.com"),
                array(
                    'username' => 'Bounder',     
                    'name' => 'Ian', 
                    'surname' => ' Mune',    
                    'email' => "Bounder@gmail.com"),
                array(
                    'username' => 'Haldir',     
                    'name' => 'Craig', 
                    'surname' => ' Parker',    
                    'email' => "Haldir@gmail.com"),
                array(
                    'username' => 'FarmerMaggot',     
                    'name' => 'Cameron', 
                    'surname' => ' Rhodes',    
                    'email' => "FarmerMaggot@gmail.com"),
                array(
                    'username' => 'Gimli',     
                    'name' => 'John', 
                    'surname' => ' Rhys-Davies',    
                    'email' => "Gimli@gmail.com"),
                array(
                    'username' => 'GateKeeper',     
                    'name' => 'Martyn', 
                    'surname' => ' Sanderson',    
                    'email' => "GateKeeper@gmail.com"),
                array(
                    'username' => 'Isildur',     
                    'name' => 'Harry', 
                    'surname' => ' Sinclair',    
                    'email' => "Isildur@gmail.com"),
                array(
                    'username' => 'Arwen',     
                    'name' => 'Liv', 
                    'surname' => ' Tyler',    
                    'email' => "Arwen@gmail.com"),
                array(
                    'username' => 'Barliman',     
                    'name' => 'David',
                    'surname' => ' Weatherley',    
                    'email' => "Barliman@gmail.com"),
                array(
                    'username' => 'Elrond',     
                    'name' => 'Hugo', 
                    'surname' => ' Weaving',    
                    'email' => "Elrond@gmail.com"),
            );        
    }

}