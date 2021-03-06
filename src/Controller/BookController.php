<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Entity\SearchBook;
use App\Repository\BookRepository;
use App\Form\SearchBookType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/book")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="book_index", methods={"GET"})
     */
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('book/index.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="book_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('book_index');
        }

        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="book_show", methods={"GET"})
     */
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', [
            'book' => $book,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="book_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Book $book): Response
    {
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('book_index');
        }

        return $this->render('book/edit.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home_search", name="home.search")
     */
    /*public function SearchBook(BookRepository $bookRepository, Request $request)

    {

         $search = new SearchBook();
        $searchform = $this->createForm(SearchBookType::class, $search);


        if ($searchform->handleRequest($request)->isSubmitted() && $searchform->isValid()) {
            $search = $searchform->getData();
            $searchBook = $bookRepository->findAllBy($search);


        return $this->render('home/search.html.twig', [
            
            'books' =>  $search,
            'SearchBookType' => $searchform->createView()
        ]);

    }
    }
*/
    /**
     * @Route("/{id}", name="book_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Book $book): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($book);
            $entityManager->flush();
        }

        return $this->redirectToRoute('book_index');
    }






  /**
     * @Route("/", name="book_index", methods={"GET"})
     */
    /*public function search(BookRepository $bookRepository, Request $request , PaginatorInterface $paginator): Response


    {

        

         $research = new SearchBook();
        $searchform = $this->createForm(SearchBookType::class, $research);
        
    

        if ($searchform->handleRequest($request)->isSubmitted() && $searchform->isValid()) {
            $search = $searchform->getData();
            $searchBook = $bookRepository->findAllBy($search);
            $Books == $paginator->paginate(
            // Doctrine Query, not results
                $searchBook ,
                // Define the page parameter
                $request->query->getInt('page', 1),
                // Items per page
                4 );
            var_dump($research);
          
       if ($searchBook == null) {
                $this->addFlash('erreur', 'Aucun article contenant ce mot clé dans le titre n\'a été trouvé, essayez en un autre.');
           
            }
             return $this->redirectToRoute('home');
        
    }



        return $this->render('book/index.html.twig', [
            
            'books' =>  $Books,
    
            'SearchBookType' => $searchform->createView()
        ]);
    }


*/




}
