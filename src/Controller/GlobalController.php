<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GlobalController extends AbstractController
{
    #[Route('/', name: 'app_global')]
    public function index(): Response
    {
        return $this->render('global/index.html.twig', [
            'title' => '🪩 Night Club 🪩',
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contactGet(): Response
    {
        return $this->render(
            'global/contact.html.twig'
        );
    }

    #[Route('/contact', name: 'contact')]
    public function contactPost(): Response
    {
        return $this->render(
            'global/contact.html.twig'
        );
    }

    #[Route('/apropos')]
    public function apropos(): Response
    {
        return $this->render(
            'global/apropos.html.twig', [
                'Historique' => [
                    ['annee' => 2020, 'event' => 'Ouverture du nightclub'],
                    ['annee' => 2021, 'event' => 'Projet X'],
                    ['annee' => 2021, 'event' => 'Fermeture du nightclub'],
                ],
            ]
        );
    }



    #[Route('/article/nouveau')]
    public function nouveau()
    {
        return new Response("Mon nouvel article");
    }

    #[Route('/article/{slug}, methods: "GET"')]
    public function article(string $slug): Response
    {
        return new Response("Article numéro $slug");
    }


    #[Route('/bonjour', name: 'bonjour')]
    public function bonjour(Request $request): Response
    {
        if ($request->query->get('prenom')) {
            return new Response('Bonjour ' . $request->query->get('prenom') . ' !');
        } else {
            return new response('Bonjour invité !');
        }
    }

    #[Route('/json/test')]
    public function monJson()
    {
        $test = [
            [
                'id' => 1,
                'annee' => '1995',
                'text' => 'Mon année de naissance',
            ],
            [
                'id' => 2,
                'annee' => '2012',
                'text' => 'La fin du monde',
            ]
        ];
        dd($test);
        return $this->json($test, Response::HTTP_OK);
    }
}
