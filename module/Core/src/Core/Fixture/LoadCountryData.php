<?php
// ./module/Core/src/Core/Fixture/LoadCountryData.php

namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Zend\Json\Json;

/**
 * See: https://github.com/doctrine/data-fixtures
 */
class LoadCountryData implements OrderedFixtureInterface, FixtureInterface
{

    public function getOrder() 
    {
        return 1; // number in which order to load fixtures
    }


    public function load(ObjectManager $objectManager)
    {
        $countries = $this->getCountries();

        foreach ($countries as $record) 
        {
            $country = new \Core\Entity\Country();

            $country->setName($record['name']);
            $country->setAlpha2($record['alpha-2']);
            $country->setAlpha3($record['alpha-3']);

            $objectManager->persist($country);
            $objectManager->flush();
        }
    }


    /**
     * Returns an array with countries
     * @return array $array
     */
    public function getCountries() 
    {
        // $json = file_get_contents('https://raw.github.com/lukes/ISO-3166-Countries-with-Regional-Codes/master/all/all.json');

        $json = file_get_contents('./data/countries.json');
        $array = \Zend\Json\Json::decode($json, \Zend\Json\Json::TYPE_ARRAY);
        return $array;
        
    }


}