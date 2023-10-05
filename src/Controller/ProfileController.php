<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\Image;
use App\Entity\User;
use App\Form\FormCandidateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

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
          
            
           


            $entityManager->persist($candidat);
            $entityManager->flush();
       }
       
          /**
         * @var User $user
         */
        //  $user = $this->getUser();
        //  $candidat = $user->getCandidate();
        //   $candidat->setCreatedAt(new DateTimeImmutable());
         //     $candidat->setUpdatedAt(new DateTimeImmutable());

          //    if($formCandidate['profilpicture']->getData()){

                 /**
                  *  @var UploadeFile $profilPictureFile
                  */
           //       $profilPictureFile = $formCandidate['profilpicture']->getData();

            //      $profilPictureName = Uuid::v7();

            //      $extension = $profilPictureFile->guessExtension();
             //     if(!$extension) {
             //         $extension = 'png';
             //     }
             //     $profilPictureName = $profilPictureName.'.'.$extension;

               //   $profilPictureFile->move('image/profilPictures', $profilPictureName);
 
               //   $profilPIctureMedia = new Image();
               //   $profilPIctureMedia->setUrl($profilPictureName);
               //   $profilPIctureMedia->setOriginalName($profilPictureFile->getClientOriginalName());

               //  $entityManager->persist($profilPictureFile);

                //  $candidat->setProfilPicture($profilPictureFile);
            //  }

          
            //  dd($candidat);
             
            
        return $this->render('profile/index.html.twig', [
            'formCandidate' => $formCandidate,
            'candidat' => $candidat,

        ]);
    }
}
