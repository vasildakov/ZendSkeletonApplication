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
        return 10;
    }

    public function load(ObjectManager $objectManager)
    {
        $campaigns = $this->getCampaigns();

        foreach ($campaigns as $key => $value) 
        {
            $operator = $objectManager->find('\Core\Entity\Operator', $value['operator_id']);

            $campaign = new \Core\Entity\Campaign();
            $campaign->setName($value['name']);
            $campaign->setOperator( $operator );

            $objectManager->persist($campaign);
            $objectManager->flush();
        }
    }


    public function getCampaigns() 
    {
        return array(
            array('name' => "888 Test Campaign 1", "operator_id" => 2),
            array('name' => "888 Test Campaign 2", "operator_id" => 2),
            array('name' => "888 Test Campaign 3", "operator_id" => 2),
            array('name' => "bet365 Test Campaign 1", "operator_id" => 1),
            array('name' => "bet365 Test Campaign 2", "operator_id" => 1),
        );
    }

}