<?php

namespace App\Controller;

use App\Entity\Categorys;
use App\Form\CategorysType;
use App\Repository\CategorysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorys")
 */
class CategorysController extends AbstractController
{
    /**
     * @Route("/", name="categorys_index", methods={"GET"})
     */
    public function index(CategorysRepository $categorysRepository): Response
    {
        return $this->render('categorys/index.html.twig', [
            'categorys' => $categorysRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorys_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $category = new Categorys();
        $form = $this->createForm(CategorysType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('categorys_index');
        }

        return $this->render('categorys/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorys_show", methods={"GET"})
     */
    public function show(Categorys $category): Response
    {
        return $this->render('categorys/show.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorys_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Categorys $category): Response
    {
        $form = $this->createForm(CategorysType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorys_index');
        }

        return $this->render('categorys/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorys_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Categorys $category): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorys_index');
    }
}
