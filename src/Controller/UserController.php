<?php

namespace App\Controller;
use App\Entity\Image;
use App\Entity\Candidate;
use App\Entity\JobOffer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\GendreType;
use App\Entity\Gendre;
use App\Form\FormCandidateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    #[Route('/profile', name: 'app_user')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $currentUser = $this->getUser();
        $candidat = $currentUser->getCandidate();

        if(empty($candidat))
        {
            $candidat = new Candidate();
            $currentUser->setCandidate($candidat);
            $entityManager->persist($currentUser);
            $entityManager->flush();
        }

        $form = $this->createForm(FormCandidateType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($currentUser);
            $entityManager->flush();
            $this->addFlash('success', 'Profil mis à jour avec succès.');
        }
        return $this->render('profile/index.html.twig', [
            'FormCandidate' => $form,
        ]);
    }


    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */

    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */

    public function show(User $user): Response
    {

        return $this->render('user/show.html.twig', [
            'user' => $user,
            'id' => $this->getUser()->getId()
        ]);
    }

    public function form(Request $request)
    {
        $gendre = new Gendre();
        $form = $this->createForm(GendreType::class, $gendre);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        }

        return $this->render('votre_vue.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**public function Update(Request $request)
    {
        // Récupérer le formulaire
        $form = $this->createForm(ProfileType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les fichiers téléchargés
            $profileImageFile = $form->get('Image')->getImageData();

            // Vérifier si un fichier a été téléchargé
            if ($profileImageFile) {
                // Générer un nom de fichier unique
                $newFilename = md5(uniqid()) . '.' . $profileImageFile->guessExtension();

                // Déplacez le fichier vers le répertoire de stockage
                $profileImageFile->move(
                    $this->getParameter('upload_directory'), // Répertoire de stockage configuré dans services.yaml
                    $newFilename
                );

                // Enregistrez le nom de fichier dans l'entité utilisateur (ou où vous le stockez)
                $user->setProfilPicture($newFilename);
            }

            // Enregistrez l'entité utilisateur mise à jour dans la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            
        }

        // Afficher le formulaire Twig
        return $this->render('profile_update/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }**/

    public function upload($file, $targetDirectory, $slugger)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {

            $file->move(
                $this->getParameter($targetDirectory),
                $newFilename
            );
            return $newFilename;
        } catch (FileException $e) {
            throw new \Exception($e->getMessage());
            // ... handle exception if something happens during file upload
        }

    }
}