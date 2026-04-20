<?php

namespace App\DataFixtures;

use App\Factory\ArtisteFactory;
use App\Factory\SoireeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $artistes = ArtisteFactory::createMany(10);
        $manager->flush();

        SoireeFactory::createMany(10, function () use ($artistes) {
            return [
                'artistes' => [$artistes[array_rand($artistes)]],
            ];
        });
    }
}
