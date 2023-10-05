<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OfferRepository;
use App\Repository\CategoryRepository;
use App\Repository\CandidatureRepository;
use App\Entity\Offer;
use App\Entity\Candidature;


class JobController extends AbstractController
{
   


    #[Route('/job/show/{id}', name: 'app_job')]
    public function show(int $id, OfferRepository $OfferRepository, CandidatureRepository  $CandidatureRepository ): Response
    {
        $Offer = $OfferRepository->find($id);
        $Offer_previous = $OfferRepository->findPreviousJob($Offer); 
        $Offer_next = $OfferRepository->findNextJob($Offer); 

        $job_previous = $Offer_previous ? [$Offer_previous] : [];
        $job_next = $Offer_next ? [$Offer_next] : [];

        $user = $this->getUser();
    $candidatureExists = $CandidatureRepository->candidatureExistsForUser($Offer, $user);

        return $this->render('job/show.html.twig', [
            'Offer' => $Offer,
            'job_previous' => $job_previous,
            'job_next' => $job_next,
            'candidatureExists' => $candidatureExists,
            
        ]);
    }

    #[Route('/job', name: 'job_index')]
    public function job_index(OfferRepository $OfferRepository, CategoryRepository $jobCategoryRepository): Response
    {
       
        $user = $this->getUser();
        $categories = $jobCategoryRepository->findAll();

        
        return $this->render('job/index.html.twig', [
            'offers' => $OfferRepository->findAll(),
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function new(Request $request): Response
    {
        $Offer = new Offer();
        $form = $this->createForm(OfferType::class, $Offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Offer);
            $entityManager->flush();

            return $this->redirectToRoute('job_offer_index');
        }

       
    }
}
