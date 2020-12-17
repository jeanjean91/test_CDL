<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use App\Entity\SearchBook;
use App\Form\SearchBookType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/", name="home")
     */

    public function searchBook(BookRepository $repository, Request $request){
		
        $search = new SearchBook();
        $searchform = $this->createForm(SearchBookType::class, $search);


        if ($searchform->handleRequest($request)->isSubmitted() && $searchform->isValid()) {
            $search = $searchform->getData();
            $searchBook = $repository->findAllBy($search);
            
	}

			return $this->render('home/index.html.twig', [
				'books' => $repository->findAll(),
		          /*  'books' => ->findAllBy($search),*/
		            'SearchBookType' => $searchform->createView()
		        ]);
		}

}


