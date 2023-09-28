<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\JobOffer;
use App\Form\JobOfferType;
use App\Controller\Security;
use App\Repository\CandidatureRepository;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class JobOfferController extends AbstractController
{
    #[Route('/job_offer/index', name: 'app_job_offer')]
    public function index(): Response
    {
        return $this->render('job_offer/index.html.twig', [
            'controller_name' => 'JobOfferController',
        ]);
    }

    /**#[Route('/job_offer/new', name: 'job_offer_new')]
      **/
    public function new(Request $request): Response
    {
        $jobOffer = new JobOffer();
        $form = $this->createForm(JobOfferType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jobOffer);
            $entityManager->flush();

            return $this->redirectToRoute('job_offer_index');
        }

        return $this->render('job_offer/new.html.twig', [
            'job_offer' => $jobOffer,
            'form' => $form->createView(),
            'completedProfile' => $this->getUser()->getCompletedProfile()
        ]);
    }

     /**
     * @Route("/{id}", name="job_offer_show", methods={"GET"})
     */
     
      #[Route("/{id}", name: "job_offer_show", methods: ["GET"])]
     
    public function show(
        JobOffer $jobOffer, 
        JobOfferRepository $jobOfferRepository, 
        CandidatureRepository $candidatureRepository,
        Security $security
        ): Response
    {
        /** @var User */

        
        $user = $security->getUser();
        $jobBefore = $jobOfferRepository->getPreviousJob($jobOffer);
        $jobAfter = $jobOfferRepository->getNextJob($jobOffer);
        $user->setCandidate($user->getCandidate());
        $jobTypeRepository = $this->getDoctrine()
        ->getRepository(JobTypes::class);

        $jobType = $jobTypeRepository->findOneBy(['id' => $jobOffer->getJobType()]);

        return $this->render('job_offer/show.html.twig', [
            'job_offer' => $jobOffer,
            'job_type' => $jobType,
            'job_previous'=> $jobBefore,
            'job_next'=> $jobAfter,
        // convertir candidature en Boolean
            'candidatureExists' => !! $candidatureRepository->findOneBy([
                'job_offer'=> $jobOffer->getId(),
                'candidat'=> $user->getCandidate()->getId(),
            ])
        ]);
    }

     /**
     * @Route("/{id}/edit", name="job_offer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, JobOffer $jobOffer): Response
    {
        $form = $this->createForm(JobOfferType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_offer_index');
        }

        return $this->render('job_offer/edit.html.twig', [
            'job_offer' => $jobOffer,
            'form' => $form->createView(),
        ]);
    }
}
