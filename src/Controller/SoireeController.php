<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Soiree;
use App\Repository\SoireeRepository;
use App\Form\SoireeType;
use Symfony\Component\HttpFoundation\Request;


final class SoireeController extends AbstractController
{
    #[Route('/soiree/creer', name: 'creer_soiree')]
    public function creerSoiree(EntityManagerInterface $em, Request $request): Response
    {
        $soiree = new Soiree();
        $form = $this->createForm(SoireeType::class, $soiree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $soiree->setDatecreation(new \DateTimeImmutable());
            $em->persist($soiree);
            $em->flush();
            return $this->redirectToRoute('soirees');
        }

        return $this->render('soiree/creer.html.twig', [
            'form' => $form->createView(),
        ]);
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

    #[Route('/soiree/{id}/update', name: 'update_soiree')]
    public function update_soiree(EntityManagerInterface $em, int $id): Response
    {
        $repository = $em->getRepository(Soiree::class);
        $soiree = $repository->find($id);
        $soiree->setTitre("nouveau nom de soiree $id");
        $em->flush();
        dd($soiree);
    }

    #[Route('/soiree/{id}/delete', name: 'delete_soiree')]
    public function delete_soiree(EntityManagerInterface $em, int $id): Response
    {
        $repository = $em->getRepository(Soiree::class);
        $soiree = $repository->find($id);
        $em->remove($soiree);
        $em->flush();
        return $this->redirectToRoute('soirees');
    }
}
