<?php

namespace App\DataFixtures;

use App\Entity\Marque;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MarqueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        $faker = Factory::create();
//
//        for ($i = 0; $i < 10; $i++) {
//            $marque = new Marque();
//            $marque->setNom($faker->unique(true)->company);
//            $manager->persist($marque);
//        }
//        $manager->flush();
    }
}
