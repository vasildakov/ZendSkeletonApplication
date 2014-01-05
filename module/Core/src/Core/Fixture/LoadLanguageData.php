<?php
// ./module/Core/src/Core/Fixture/LoadLanguageData.php

namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;


class LoadLanguageData implements OrderedFixtureInterface, FixtureInterface
{

    public function getOrder() 
    {
        return 1; // number in which order to load fixtures
    }
    

    public function load(ObjectManager $objectManager)
    {

        $activeLanguages = array("English", "French", "German", "Italian", "Russian");

        $languages = $this->getLanguages();

        foreach ($languages as $record) 
        {
            $language = new \Core\Entity\Language();
            $language->setCode($record['code']);
            $language->setName($record['name']);
            $language->setNativeName($record['nativeName']);

            if( in_array($record['name'], $activeLanguages)) {
                $language->setStatus(1);
            } else {
                $language->setStatus(2);
            }
            
            $objectManager->persist($language);
            $objectManager->flush();
        }
    }


    /**
     * Returns an array with languages
     * 
     * @return array $array  
     */
    public function getLanguages() 
    {
        $json = file_get_contents('./data/languages.json');
        $array = \Zend\Json\Json::decode($json, \Zend\Json\Json::TYPE_ARRAY);
        return $array;
    }

}