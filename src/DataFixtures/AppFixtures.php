<?php

namespace App\DataFixtures;

use App\Entity\Soiree;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $soiree1 = new Soiree();
        $soiree1->setTitre("Soirée Mousse");
        $soiree1->setDatesoiree(new \DateTimeImmutable('2026-06-15'));
        $soiree1->setDatecreation(new \DateTimeImmutable());
        $soiree1->setStatut("À venir");
        $manager->persist($soiree1);

        $soiree2 = new Soiree();
        $soiree2->setTitre("Soirée Neon");
        $soiree2->setDatesoiree(new \DateTimeImmutable('2026-07-20'));
        $soiree2->setDatecreation(new \DateTimeImmutable());
        $soiree2->setStatut("À venir");
        $manager->persist($soiree2);

        $soiree3 = new Soiree();
        $soiree3->setTitre("Soirée Années 80");
        $soiree3->setDatesoiree(new \DateTimeImmutable('2026-08-10'));
        $soiree3->setDatecreation(new \DateTimeImmutable());
        $soiree3->setStatut("En préparation");
        $manager->persist($soiree3);

        $manager->flush();
    }
}