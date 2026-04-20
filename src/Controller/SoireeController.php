<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Soiree;

final class SoireeController extends AbstractController
{
    #[Route('/soiree/creer', name: 'creer_soiree')]
    public function creerSoiree(EntityManagerInterface $em): Response
    {
        $soiree = new Soiree();
        $soiree->setTitre("Soirée mousse");
        $soiree->setDatesoiree(new \DateTimeImmutable());
        $soiree->setDatecreation(new \DateTimeImmutable());
        $soiree->setStatut("actif");

        $em->persist($soiree);
        $em->flush();

        return new Response("Soirée créée avec l'ID : " . $soiree->getId());
    }
}
