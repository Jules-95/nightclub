<?php

namespace App\Controller;

use App\Repository\MaterielRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController
{
    #[Route('/api/materiel', name: 'api_materiel', methods: ['GET'])]
    public function apiMateriel(MaterielRepository $materielRepository): Response
    {
        $materiels = $materielRepository->findAll();
        return $this->json($materiels, 200, [], ['groups' => 'list']);
    }
}