<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\FormCandidateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidateController extends AbstractController
{
    #[Route('/candidate', name: 'app_candidate')]
    public function index(): Response
    {
        return $this->render('candidate/index.html.twig', [
            'controller_name' => 'CandidateController',
        ]);
    }
    public function form(Request $request)
    {
        $form = $this->createForm(FormCandidateType::class);

        $form->handleRequest($request);

        return $this->render('index.html.twig', [
            'FormCandidate' => $form->createView(),
        ]);
    }

    
    public function uploadFile(Request $request)
    {
        $media = new Image();
        $form = $this->createForm(FileType::class, $media);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($media);
            $entityManager->flush();

            return $this->redirectToRoute('upload_directory');
        }
    }

}
