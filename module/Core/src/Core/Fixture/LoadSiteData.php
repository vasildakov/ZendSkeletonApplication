<?php
namespace Core\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadSiteData implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sites = $this->getSites();

        foreach ($sites as $key => $value) 
        {
            #$created = new \Zend\StdLib\DateTime();

            $site = new \Core\Entity\Site();
            $site->setUrl($value['url']);
            #$site->setCreatedAt( $created );
            $manager->persist($site);
            $manager->flush();
        }
    }


    public function getSites() 
    {
        return array(
            array('url' => "http://www.google.com"),
            array('url' => "http://www.yahoo.com"),
            array('url' => "http://www.linkedin.com"),
            array('url' => "http://www.cnn.com"),
            array('url' => "http://www.wikipedia.com"),
            array('url' => "http://www.dir.bg"),
            array('url' => "http://www.alexa.com"),
            array('url' => "http://www.youtube.com"),
            array('url' => "http://www.amazon.com"),
            array('url' => "http://www.live.com"),
            array('url' => "http://www.twitter.com"),
            array('url' => "http://www.blogspot.com"),
            array('url' => "http://www.ebay.com"),
            array('url' => "http://www.bing.com"),
            array('url' => "http://www.yandex.com"),
            array('url' => "http://www.tumblr.com"),
            array('url' => "http://www.msn.com"),
            array('url' => "http://www.ask.com"),
            array('url' => "http://www.mail.ru"),
            array('url' => "http://www.paypal.com"),
            array('url' => "http://www.microsoft.com"),
            array('url' => "http://www.apple.com"),
            array('url' => "http://www.instagram.com"),
            array('url' => "http://www.imdb.com"),
            array('url' => "http://www.example.com"),
        );
    }

    public function getOrder() 
    {
    	return 1;
    }
}