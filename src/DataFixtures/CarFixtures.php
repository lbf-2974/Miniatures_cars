<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Car;

class CarFixtures extends Fixture implements DependentFixtureInterface
{
    public const CARS = [

        ['brand' => "TOYOTA",
         'model' =>  "AE86",
         'image' =>  "build/images/toyotaae86.jpg",
         'manufacturer' => "Hot Wheels"],

         ['brand' => "CAMARO",
         'model' =>  "ZL1",
         'image' =>  "build/images/camaro.jpg",
         'manufacturer' => "Hot Wheels"],

         ['brand' => "PORSCHE",
         'model' =>  "PANAMERA TURBO S",
         'image' =>  "build/images/porsche.jpg",
         'manufacturer' => "Hot Wheels"],

         ['brand' => "MERCEDES",
         'model' =>  "SLS",
         'image' =>  "build/images/mercedessls.jpg",
         'manufacturer' => "Majorette"],

         ['brand' => "NISSAN",
         'model' =>  "GT-R",
         'image' =>  "build/images/nissangtr.jpg",
         'manufacturer' => "Majorette"],

         ['brand' => "DODGE",
         'model' =>  "CHARGER SRT",
         'image' =>  "build/images/dodge.jpg",
         'manufacturer' => "Majorette"],

         ['brand' => "AUDI",
         'model' =>  "RS 5 RACING ",
         'image' =>  "build/images/audirs5.jpg",
         'manufacturer' => "Siku"],

         ['brand' => "AUDI",
         'model' =>  "R8 SPYDER",
         'image' =>  "build/images/audir8spyder.jpg",
         'manufacturer' => "Siku"],

         ['brand' => "MERCEDES",
         'model' =>  "AMG GT4",
         'image' =>  "build/images/mercedesamggt4.jpg",
         'manufacturer' => "Siku"],
        ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CARS as $carData) {
            $car = new Car();
            $car ->setBrand($carData['brand']);
            $car ->setModel($carData['model']);
            $car ->setimage($carData['image']);
            $car->setManufacturer($this->getReference('manufacturer_' . $carData['manufacturer']));
            $manager->persist($car);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          ManufacturerFixtures::class,
        ];
    }
}
