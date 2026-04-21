<?php

namespace App\DataFixtures;

use App\Factory\ArtisteFactory;
use App\Factory\MaterielSoireeFactory;
use App\Factory\MaterielFactory;
use App\Factory\SoireeFactory;
use App\Factory\ThemeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $themes = ThemeFactory::createMany(5);
        $manager->flush();

        $artistes = ArtisteFactory::createMany(10);
        $manager->flush();

        MaterielFactory::createMany(5);
        $manager->flush();

        SoireeFactory::createMany(10, function () use ($artistes, $themes) {
            return [
                'artistes' => [$artistes[array_rand($artistes)]],
                'theme' => $themes[array_rand($themes)]
            ];
        });

        $manager->flush();

        MaterielSoireeFactory::createMany(10);
    }
}
