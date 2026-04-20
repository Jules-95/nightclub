<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Soiree;
use App\Repository\SoireeRepository;

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

    #[Route('/soirees', name: 'soirees')]
    public function soirees(SoireeRepository $soireeRepository): Response
    {
        $soirees = $soireeRepository->findAll();
        dd($soirees);
    }


    #[Route('/soiree/{id}', name: 'soiree_read')]
    public function soiree(int $id, SoireeRepository $soireeRepository): Response
    {
        $soiree = $soireeRepository->find($id);
        dd($soiree);
    }
}
