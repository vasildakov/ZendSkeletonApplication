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

		    $affiliate = new \Core\Entity\Affiliate();
		    $affiliate->setUsername($row['username']);
            $affiliate->setName($row['name']);
            $affiliate->setSurname($row['surname']);
		    $affiliate->setEmail($row['email']);
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
                    'email' => "barry@gmail.com"
                ),
                array(
                    'username' => 'Frodo',     
                    'name' => 'Elijah',
                    'surname' => ' Wood',    
                    'email' => "barry@gmail.com"
                ),
                array(
                    'username' => 'Proudfoot',     
                    'name' => 'Noel',
                    'surname' => ' Appleby',    
                    'email' => "barry@gmail.com"
                ),
                array(
                    'username' => 'Samwise',     
                    'name' => 'Sean', 
                    'surname' => ' Astin',    
                    'email' => "barry@gmail.com"
                    ),

                array(
                    'username' => 'Sauron',     
                    'name' => 'Sala', 
                    'surname' => ' Baker',    
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'Boromir',     
                    'name' => 'Sean', 
                    'surname' => ' Bean',    
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'Galadriel',     
                    'name' => 'Cate', 
                    'surname' => ' Blanchett',    
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'Legolas',     
                    'name' => 'Orlando', 
                    'surname' => ' Bloom',    
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'Pippin',     
                    'name' => 'Billy', 
                    'surname' => ' Boyd',    
                    'email' => "barry@gmail.com"
                    ),

                array(
                    'username' => 'Celeborn',     
                    'name' => 'Marton',
                    'surname' => 'Csokas',    
                    'email' => "barry@gmail.com"
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
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'GilGalad',     
                    'name' => 'Mark', 
                    'surname' => ' Ferguson',    
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'BilboBaggins',     
                    'name' => 'Ian', 
                    'surname' => ' Holm',    
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'Saruman',     
                    'name' => 'Christopher', 
                    'surname' => ' Lee',    
                    'email' => "barry@gmail.com"),

                array(
                    'username' => 'Lurtz',     
                    'name' => 'Lawrence', 
                    'surname' => ' Makoare',    
                    'email' => "barry@gmail.com"
                    ),
                array(
                    'username' => 'Gollum',     
                    'name' => 'Andy', 
                    'surname' => ' Serkis',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'WitchKing',     
                    'name' => 'Brent', 
                    'surname' => ' McIntyre',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'GandalfTheGrey',     
                    'name' => 'Ian', 
                    'surname' => ' McKellen',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Elendil',     
                    'name' => 'Peter', 
                    'surname' => ' McKenzie',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'RoseCotton',     
                    'name' => 'Sarah', 
                    'surname' => ' McLeod',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'MeriadocBrandybuck',     
                    'name' => 'Dominic', 
                    'surname' => ' Monaghan',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Aragorn',     
                    'name' => 'Viggo', 
                    'surname' => ' Mortensen',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Bounder',     
                    'name' => 'Ian', 
                    'surname' => ' Mune',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Haldir',     
                    'name' => 'Craig', 
                    'surname' => ' Parker',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'FarmerMaggot',     
                    'name' => 'Cameron', 
                    'surname' => ' Rhodes',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Gimli',     
                    'name' => 'John', 
                    'surname' => ' Rhys-Davies',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'GateKeeper',     
                    'name' => 'Martyn', 
                    'surname' => ' Sanderson',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Isildur',     
                    'name' => 'Harry', 
                    'surname' => ' Sinclair',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Arwen',     
                    'name' => 'Liv', 
                    'surname' => ' Tyler',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Barliman',     
                    'name' => 'David',
                    'surname' => ' Weatherley',    
                    'email' => "barry@gmail.com"),
                array(
                    'username' => 'Elrond',     
                    'name' => 'Hugo', 
                    'surname' => ' Weaving',    
                    'email' => "barry@gmail.com"),
            );        
    }

}