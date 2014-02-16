<?php
// ./module/Core/src/Core/Fixture/LoadOperatorData.php

namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 * See: https://github.com/doctrine/data-fixtures
 */
class LoadOperatorData implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $objectManager)
    {
    	// $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	
        $operators = $this->getOperators();

    	foreach($operators as $row) {
		    $operator = new \Core\Entity\Operator();
		    $operator->setName($row['name']);
            $operator->setUrl($row['url']);

		    $objectManager->persist($operator);
		    $objectManager->flush();
    	}

    }

    public function getOperators() 
    {
        return array(
            array("name" => "bet365", "url" => "http://bet365.com"),
            array("name" => "888", "url" => "http://www.888.com"),
            array("name" => "King.com", "url" => "http://www.king.com"),
            array("name" => "BetFair", "url" => "http://www.betfair.com"),
            array("name" => "William Hill", "url" => "http://www.williamhill.com"),
            array("name" => "TAB Racing and Sports", "url" => "http://www.tab.co.nz"),
            array("name" => "SkyBet", "url" => "http://www.skybet.com"),
            array("name" => "Paddy Power", "url" => "http://www.paddypower.com"),
            array("name" => "TAB Sportsbet", "url" => "http://www.tab.com.au"),
            array("name" => "Casino.com", "url" => "http://www.casino.com"),
            array("name" => "888 Poker", "url" => "http://www.888poker.com"),
            array("name" => "Ladbrokes", "url" => "http://www.ladbrokes.com"),
            array("name" => "StarGames", "url" => "http://www.stargames.com"),
            array("name" => "SportsBet", "url" => "http://www.sportsbet.com.au"),
            array("name" => "Sportingbet", "url" => "http://www.sportingbet.com"),
            array("name" => "PokerStars", "url" => "http://www.pokerstars.eu"),
            array("name" => "Betfred", "url" => "http://www.betfred.eu"),
        );
    }

    public function getOrder() 
    {
    	return 1;
    }
}