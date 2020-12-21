<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use App\Repository\UserRepository;
use App\Entity\SearchBook;
use App\Form\SearchBookType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BookRepository $bookRepository, Request $request , PaginatorInterface $paginator ): Response


    {
/*
    	 $auteur = $repo->findByExampleField($id);*/
    	 $allbook = $bookRepository->findAll();
    	  $book = $paginator->paginate(
            // Doctrine Query, not results
                $allbook,
                // Define the page parameter
                $request->query->getInt('page', 1),
                // Items per page
                9 );

              


    	  $search = new SearchBook();
        $searchform = $this->createForm(SearchBookType::class, $search);


        if ($searchform->handleRequest($request)->isSubmitted() && $searchform->isValid()) {
            $search = $searchform->getData();
            $searchBook = $bookRepository->findAllBy($search);
            /*$cat =  $bookRepository->findByExampleField($search); */
            $book = $paginator->paginate(
           
                $searchBook ,
                
                $request->query->getInt('page', 1),
                // Items per page
                9 );

           /* var_dump($book);*/

            if ($book == null) {
                $this->addFlash('erreur', 'Aucun article contenant ce mot clé dans le titre n\'a été trouvé, essayez en un autre.');
           
            }



}
        return $this->render('home/index.html.twig', [
            'books' => $book,
         
            'SearchBookType' => $searchform->createView()
        ]);
    }


    /**
     * @Route("/", name="home")
     */

    /*public function SearchBook(BookRepository $repository, Request $request , PaginatorInterface $paginator){
		
        $search = new SearchBook();
        $searchform = $this->createForm(SearchBookType::class, $search);


        if ($searchform->handleRequest($request)->isSubmitted() && $searchform->isValid()) {
            $search = $searchform->getData();
            $searchBook = $repository->findAllBy($search);
            $book = $paginator->paginate(
            // Doctrine Query, not results
                $searchBook,
                // Define the page parameter
                $request->query->getInt('page', 1),
                // Items per page
                4 );
                
            
	}

			return $this->render('home/search.html.twig', [
				 'books' => $book,

		            'SearchBookType' => $searchform->createView()
		        ]);
		}

*/


        
                
}


