<?php

namespace App\Controller;

use App\Entity\SocieteDeGestion;
use App\Form\SocieteDeGestionType;
use App\Repository\SocieteDeGestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/societedegestion')]
class SocieteDeGestionController extends AbstractController
{
    #[Route('/', name:'societe_de_gestion_index', methods:['GET'])]
function index(SocieteDeGestionRepository $societeDeGestionRepository): Response
    {
    return $this->render('societe_de_gestion/index.html.twig', [
        'societe_de_gestions' => $societeDeGestionRepository->findBy(array(), array('id' => 'DESC')),
    ]);
}

#[Route('/new', name:'societe_de_gestion_new', methods:['GET', 'POST'])]
function new (Request $request, EntityManagerInterface $entityManager): Response {
    $societeDeGestion = new SocieteDeGestion();
    $form = $this->createForm(SocieteDeGestionType::class, $societeDeGestion);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($societeDeGestion);
        $entityManager->flush();

        return $this->redirectToRoute('societe_de_gestion_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('societe_de_gestion/new.html.twig', [
        'societe_de_gestion' => $societeDeGestion,
        'form' => $form,
    ]);
}

#[Route('/{id}', name:'societe_de_gestion_show', methods:['GET'])]
function show(SocieteDeGestion $societeDeGestion): Response
    {
    return $this->render('societe_de_gestion/show.html.twig', [
        'societe_de_gestion' => $societeDeGestion,
    ]);
}

#[Route('/{id}/edit', name:'societe_de_gestion_edit', methods:['GET', 'POST'])]
function edit(Request $request, SocieteDeGestion $societeDeGestion, EntityManagerInterface $entityManager): Response
    {
    $form = $this->createForm(SocieteDeGestionType::class, $societeDeGestion);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return $this->redirectToRoute('societe_de_gestion_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('societe_de_gestion/edit.html.twig', [
        'societe_de_gestion' => $societeDeGestion,
        'form' => $form,
    ]);
}

#[Route('/{id}', name:'societe_de_gestion_delete', methods:['POST'])]
function delete(Request $request, SocieteDeGestion $societeDeGestion, EntityManagerInterface $entityManager): Response
    {
    if ($this->isCsrfTokenValid('delete' . $societeDeGestion->getId(), $request->request->get('_token'))) {
        $entityManager->remove($societeDeGestion);
        $entityManager->flush();
    }

    return $this->redirectToRoute('societe_de_gestion_index', [], Response::HTTP_SEE_OTHER);
}
}
