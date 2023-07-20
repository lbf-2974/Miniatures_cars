<?php

namespace App\DataFixtures;

use App\Entity\Manufacturer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ManufacturerFixtures extends Fixture
{
    public const MANUFACTURERS = [
        ['name' => "Hot Wheels",
         'image' => "build/images/hot_wheels.png"],

         ['name' => "Majorette",
         'image' => "build/images/majorette.png"],

         ['name' => "Siku",
         'image' => "build/images/siku.png"],

         ['name' => "Burago",
         'image' => "build/images/burago.png"],
        ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::MANUFACTURERS as $manufacturerData) {
            $manufacturer = new Manufacturer();
            $manufacturer ->setName($manufacturerData['name']);
            $manufacturer ->setImage($manufacturerData['image']);
            $manager->persist($manufacturer);
            $this->addReference('manufacturer_' . $manufacturerData['name'], $manufacturer);
        }
        $manager->flush();
    }
}
