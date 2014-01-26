<?php
// ./module/Core/src/Core/Fixture/LoadCurrencyData.php

namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Zend\Json\Json;

/**
 * See: https://github.com/doctrine/data-fixtures
 */
class LoadCurrencyData implements OrderedFixtureInterface, FixtureInterface
{

    public function getOrder() 
    {
        return 1; // number in which order to load fixtures
    }


    public function load(ObjectManager $objectManager)
    {
        $currencies = $this->getCurrencies();

        foreach ($currencies as $record) 
        {
            $currency = new \Core\Entity\Currency();

            $currency->setName($record['name']);
            $currency->setCc($record['cc']);
            $currency->setSymbol($record['symbol']);

            $objectManager->persist($currency);
            $objectManager->flush();
        }
    }


    /**
     * Returns an array with currencies
     * @return array $array
     */
    public function getCurrencies() 
    {
        $json = file_get_contents('./data/currencies.json');
        $array = \Zend\Json\Json::decode($json, \Zend\Json\Json::TYPE_ARRAY);
        return $array;
        
    }


}