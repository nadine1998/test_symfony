<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Scpi;
use App\Form\ScpiType;
use App\Form\SearchFormType;
use App\Repository\ScpiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/scpi')]
class ScpiController extends AbstractController
{

#[Route('/', name:'scpi_index', methods:['GET'])]
function index(ScpiRepository $scpiRepository, Request $request): Response
    {
    $search_data = new SearchData();
    $search_data->page = $request->get('page', 1);
    $form = $this->createForm(SearchFormType::class, $search_data);
    $form->handleRequest($request);

    $scpis = $scpiRepository->findByFilter($search_data);
    return $this->render('scpi/index.html.twig', [
        'scpis' => $scpis,
        'form' => $form->createView(),
    ]);
}

#[Route('/new', name:'scpi_new', methods:['GET', 'POST'])]
function new (Request $request, EntityManagerInterface $entityManager): Response {
    $scpi = new Scpi();
    $form = $this->createForm(ScpiType::class, $scpi);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($scpi);
        $entityManager->flush();

        return $this->redirectToRoute('scpi_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('scpi/new.html.twig', [
        'scpi' => $scpi,
        'form' => $form,
    ]);
}

#[Route('/{id}', name:'scpi_show', methods:['GET'])]
function show(Scpi $scpi): Response
    {
    return $this->render('scpi/show.html.twig', [
        'scpi' => $scpi,
    ]);
}

#[Route('/{id}/edit', name:'scpi_edit', methods:['GET', 'POST'])]
function edit(Request $request, Scpi $scpi, EntityManagerInterface $entityManager): Response
    {
    $form = $this->createForm(ScpiType::class, $scpi);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return $this->redirectToRoute('scpi_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('scpi/edit.html.twig', [
        'scpi' => $scpi,
        'form' => $form,
    ]);
}

#[Route('/{id}', name:'scpi_delete', methods:['POST'])]
function delete(Request $request, Scpi $scpi, EntityManagerInterface $entityManager): Response
    {
    if ($this->isCsrfTokenValid('delete' . $scpi->getId(), $request->request->get('_token'))) {
        $entityManager->remove($scpi);
        $entityManager->flush();
    }

    return $this->redirectToRoute('scpi_index', [], Response::HTTP_SEE_OTHER);
}
}
