<?php
namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 * See: https://github.com/doctrine/data-fixtures
 */
class LoadCountryData implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {

		$bulgaria = new \Core\Entity\Country();
		$bulgaria->setName('Bulgaria');

        $malta = new \Core\Entity\Country();
        $malta->setName('Malta');

        $france = new \Core\Entity\Country();
        $france->setName('France');

		$manager->persist($bulgaria);
        $manager->persist($malta);
        $manager->persist($france);

		$manager->flush();
    	
    }

    public function getOrder() 
    {
    	return 1;
    }
}