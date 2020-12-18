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
    public function index(BookRepository $bookRepository, Request $request): Response


    {
    	 $research = new SearchBook();
        $searchform = $this->createForm(SearchBookType::class, $research);
        

        if ($searchform->handleRequest($request)->isSubmitted() && $searchform->isValid()) {
            $search = $searchform->getData();
            $searchBook = $bookRepository->findAllBy($search);
            var_dump($research);
          
       if ($searchBook == null) {
                $this->addFlash('erreur', 'Aucun article contenant ce mot clé dans le titre n\'a été trouvé, essayez en un autre.');
           
            }
           /*  return $this->redirectToRoute('home');
            */
	}



        return $this->render('home/index.html.twig', [
            
            'books' =>  $research,
            'books' => $bookRepository->findAll(),
            'SearchBookType' => $searchform->createView()
        ]);
    }

    
}


