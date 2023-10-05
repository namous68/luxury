<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\controller\JobController;
use App\controller\ApplicationRepository;
use App\Entity\Candidature;
use App\Entity\Offer;
use App\Repository\OfferRepository;
use App\Repository\UserRepository;

class CandidatureController extends AbstractController
{
    #[Route('/candidature', name: 'app_candidature')]
    public function index(): Response
    {
       
        return $this->render('candidature/index.html.twig', [
            'controller_name' => 'CandidatureController',
            
        ]);
    }

    public function new(Request $request, Offer $Offer , ApplicationRepository $applicationRepository, OfferRepository $OfferRepository, UserRepository $UserRepository): Response
    {

    if($this->getUser()) {

        $candidature = new Candidature();
        $newDate = new \DateTime();

        $candidature->setDepositeDate($newDate);

        $candidature->setUser($this->getUser());
        $candidature->setOffer($Offer);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($candidature);
        $entityManager->flush();

        $candidatureExists = $applicationRepository->findOneBy(array('offer' => $Offer->getId()));

        return $this->redirectToRoute('Offer_show', [
            'id' => $Offer->getId(),
            'candidatureExists' => $candidatureExists,
            'application' => $candidature,
        ]);
    }
    else{
        $offer = $OfferRepository->findOneBy(array('id' => $request->get('id')));

        return $this->redirectToRoute('job_offer_show', [
            'id' => $offer ->getId(),
        ]);
    }
}
}