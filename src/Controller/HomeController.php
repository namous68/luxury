<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use App\Repository\CategoryRepository;
use App\Repository\OfferRepository;
use App\Repository\UserRepository;
use App\Entity\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);

       
       

    }

 
     #[Route("/contact", name:"contact_index")]
     
    public function contact_index():Response
    {
        return $this->render('home/contact.html.twig');
        
    }

     
     /**
 * @Route("/", name="home", methods={"GET"})
 */
     
    


    
     #[Route("/company", name:"company_index")]
     
    public function company_index():Response
    {
        return $this->render('home/company.html.twig');
        
    }



    
}
