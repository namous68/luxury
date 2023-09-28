<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JobOfferRepository;
use App\Repository\CategoryRepository;

class JobController extends AbstractController
{
    #[Route('/job', name: 'app_job')]
    public function index(): Response
    {
        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
        ]);
    }


    public function job_index(JobOfferRepository $jobOfferRepository, CategoryRepository $jobCategoryRepository): Response
    {
       
        $user = $this->getUser();

        $allJobCategory = $jobCategoryRepository->findAll();
        return $this->render('home/index.html.twig', [
            'job_offers' => $jobOfferRepository->findAll(),
            'user' => $user,
            'categories' => $allJobCategory,
        ]);
    }


}
