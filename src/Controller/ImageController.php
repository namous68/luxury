<?php

namespace App\Controller;

use App\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    #[Route('/image', name: 'app_image')]
    public function index(): Response
    {
        return $this->render('image/index.html.twig', [
            'controller_name' => 'ImageController',
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

        return $this->render('file/upload_directory.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
