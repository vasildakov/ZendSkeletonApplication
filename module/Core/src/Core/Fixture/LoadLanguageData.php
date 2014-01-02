<?php
namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;


class LoadLanguageData implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {

		$english = new \Core\Entity\Language();
		$english->setName('English');

        $french = new \Core\Entity\Language();
        $french->setName('French');

        $german = new \Core\Entity\Language();
        $german->setName('German');

        $spanish = new \Core\Entity\Language();
        $spanish->setName('Spanish');

        $russian = new \Core\Entity\Language();
        $russian->setName('Russian');

		$manager->persist($english);
        $manager->persist($french);
        $manager->persist($german);
        $manager->persist($spanish);
        $manager->persist($russian);
        
		$manager->flush();
    	
    }

    public function getOrder() 
    {
    	return 1;
    }
}