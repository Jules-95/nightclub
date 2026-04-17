<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Map\Bridge\Leaflet\LeafletOptions;
use Symfony\UX\Map\Bridge\Leaflet\Option\TileLayer;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;

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
        $map = (new Map('default'))
            ->center(new Point(45.7534031, 4.8295061))
            ->zoom(6)
            ->addMarker(new Marker(
                position: new Point(45.7534031, 4.8295061),
                title: 'Lyon',
            ))
            ->options((new LeafletOptions())
                ->tileLayer(new TileLayer(
                    url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    options: ['maxZoom' => 19]
                ))
            );

        return $this->render('global/contact.html.twig', [
            'map' => $map,
        ]);
    }

    #[Route('/contact', name: 'contact_post', methods: ['POST'])]
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
