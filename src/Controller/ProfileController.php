<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\User;
use App\Form\FormCandidateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        /**
         * @var User $user
         */
        $user = $this->getUser();
        $candidat = $user->getCandidate();

        if(empty($candidat)){
            $candidat = new Candidate();
            $user->setCandidate($candidat);
            $entityManager->persist($candidat);
            $entityManager->persist($user);
            $entityManager->flush();

        }

        $formCandidate = $this->createForm(FormCandidateType::class, $candidat);
        $formCandidate->handleRequest($request);

        if($formCandidate->isSubmitted() && $formCandidate->isValid())
        {
            dd($candidat);


            $entityManager->persist($candidat);
            $entityManager->flush();
        }




        return $this->render('profile/index.html.twig', [
            'formCandidate' => $formCandidate,
            'candidat' => $candidat,

        ]);
    }
}
