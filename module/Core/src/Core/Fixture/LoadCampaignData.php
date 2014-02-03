<?php
// ./module/Core/src/Core/Fixture/LoadCampaignData.php

namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadCampaignData implements OrderedFixtureInterface, FixtureInterface
{
    public function getOrder() 
    {
        return 5;
    }

    public function load(ObjectManager $manager)
    {
        $campaigns = $this->getCampaigns();

        foreach ($campaigns as $key => $value) 
        {
            #$created = new \Zend\StdLib\DateTime();

            $campaign = new \Core\Entity\Campaign();
            $campaign->setName($value['name']);
            #$campaign->setCreatedAt( $created );
            $manager->persist($campaign);
            $manager->flush();
        }
    }


    public function getCampaigns() 
    {
        return array(
            array('name' => "Test Campaign 1"),
            array('name' => "Test Campaign 2"),
            array('name' => "Test Campaign 3"),
        );
    }

}