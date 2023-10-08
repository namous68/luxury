<?php

namespace App\Controller;

use App\Entity\Application;
use App\Entity\Offer;
use App\Entity\User;
use App\Repository\ApplicationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/candidatures/{id}/new', name: 'app_candidatures_new')]
    public function new(EntityManagerInterface $entityManager,  Offer $offer): Response
    {
        $application = new Application();

        /**
         * @var User $user
         */
        $user = $this->getUser();
        $candidat = $user->getCandidate();



        $application->setOffer($offer);
        $application->setCandidate($candidat);

        $entityManager->persist($application);
        $entityManager->flush();

        return $this->redirectToRoute('app_candidatures');
    }

    #[Route('/candidatures', name: 'app_candidatures')]
    public function index(ApplicationRepository $applicationRepository): Response
    {

         /**
         * @var User $user
         */
        $user = $this->getUser();
        
        $applications = $applicationRepository->findBy(['candidate' => $user->getCandidate()]);

        return $this->render('candidate/index.html.twig', [
            'applications' => $applications,
        ]);
    }
}
