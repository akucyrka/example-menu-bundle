<?php

namespace akucyrka\ExampleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use akucyrka\ExampleMenuBundle\Entity\Menu;
use Gedmo\Blameable\Mapping\Driver\Xml;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file( __DIR__ . DIRECTORY_SEPARATOR . 'data/options.xml');
        foreach ($xml as $s) {
            $song = new Menu();
            $song->setTitle($s->title);
            $song->setContents($s->contents);
            $manager->persist($song);
        }
        $manager->flush();
    }
}
