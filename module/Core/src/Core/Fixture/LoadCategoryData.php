<?php
// ./module/Core/src/Core/Fixture/LoadCategoryData.php

namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadCategoryData implements OrderedFixtureInterface, FixtureInterface
{
    public function getOrder() 
    {
        return 10;
    }

    public function load(ObjectManager $objectManager)
    {
        $categories = $this->getCategories();

        foreach ($categories as $key => $value) 
        {
            $category = new \Core\Entity\Category();
            $category->setName($value['name']);

            $objectManager->persist($category);
            $objectManager->flush();
        }
    }


    public function getCategories() 
    {
        return array(
            array('name' => "Gambling"),
        );
    }

}