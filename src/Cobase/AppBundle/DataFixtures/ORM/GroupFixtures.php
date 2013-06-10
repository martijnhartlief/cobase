<?php

namespace Cobase\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Cobase\AppBundle\Entity\Group;

class GroupFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
        $group1 = new Group();
        $group1->setTitle('Lorem ipsum dolor sit amet');
        $group1->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.');
        $group1->setTags('symfony2, php, paradise, high five');
        $group1->setCreated(new \DateTime());
        $group1->setUpdated($group1->getCreated());
        $group1->setUser($manager->merge($this->getReference('user-1')));
        $manager->persist($group1);

        $group2 = new Group();
        $group2->setTitle('Ipsum Lorem sit dolor amet');
        $group2->setDescription('Lorem consectetur adipiscing eletra ipsum dolor sit amet.');
        $group2->setTags('symfony2, php, paradise, high five');
        $group2->setCreated(new \DateTime());
        $group2->setUpdated($group2->getCreated());
        $group2->setUser($manager->merge($this->getReference('user-2')));
        $manager->persist($group2);

        $group3 = new Group();
        $group3->setTitle('Yet another Lorem Ipsum');
        $group3->setDescription('Lorem blaa blaa blaa consectetur blaa blaa adipiscing eletra ipsum dolor sit amet.');
        $group3->setTags('symfony2, php, paradise, high five');
        $group3->setCreated(new \DateTime());
        $group3->setUpdated($group3->getCreated());
        $group3->setUser($manager->merge($this->getReference('user-3')));
        $manager->persist($group3);

        $group4 = new Group();
        $group4->setTitle('Secret group');
        $group4->setDescription('Top secret. Your eyes only.');
        $group4->setTags('paradise, comm');
        $group4->setCreated(new \DateTime());
        $group4->setUpdated($group4->getCreated());
        $group4->setIsPublic(0);
        $group4->setUser($manager->merge($this->getReference('user-3')));
        $manager->persist($group4);

        $manager->flush();

        $this->addReference('group-1', $group1);
        $this->addReference('group-2', $group2);
        $this->addReference('group-3', $group3);
        $this->addReference('group-4', $group4);
    }

    public function getOrder()
    {
        return 2;
    }
}
