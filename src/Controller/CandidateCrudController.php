<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
use App\Repository\CandidateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/candidate/crud')]
class CandidateCrudController extends AbstractController
{
    #[Route('/', name: 'app_candidate_crud_index', methods: ['GET'])]
    public function index(CandidateRepository $candidateRepository): Response
    {
        return $this->render('candidate_crud/index.html.twig', [
            'candidates' => $candidateRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_candidate_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($candidate);
            $entityManager->flush();

            return $this->redirectToRoute('app_candidate_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidate_crud/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidate_crud_show', methods: ['GET'])]
    public function show(Candidate $candidate): Response
    {
        return $this->render('candidate_crud/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_candidate_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Candidate $candidate, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_candidate_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidate_crud/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidate_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Candidate $candidate, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidate->getId(), $request->request->get('_token'))) {
            $entityManager->remove($candidate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_candidate_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
