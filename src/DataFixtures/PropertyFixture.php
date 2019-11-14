<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $facker = Factory::create('fr_FR');
        for ($i=0; $i < 100; $i++ ){

            $property = new Property();
            $property
                ->setTitle($facker->words(3,true))
                ->setDescription($facker->sentences(3,true))
                ->setSurface($facker->numberBetween(20,350))
                ->setRooms($facker->numberBetween(2,10))
                ->setBedrooms($facker->numberBetween(1,9))
                ->setFloor($facker->numberBetween(0,15))
                ->setPrice($facker->numberBetween(100000,1000000))
                ->setHeat($facker->numberBetween(0,count(Property::HEAT) - 1))
                ->setCity($facker->city)
                ->setPostalCode($facker->postcode)
                ->setSold(false)
                ->setAdress($facker->address);
            $manager->persist($property);

        }
        $manager->flush();
    }
}
