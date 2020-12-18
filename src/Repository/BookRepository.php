<?php

namespace App\Repository;

use App\Entity\Book;
use App\Entity\SearchBook;
use App\Form\SearchBookType;
use Doctrine\ORM\Query;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\Types\This;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    // /**
    //  * @return Book[] Returns an array of Book objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Book
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    /**
     * @param SearchBook $search
     * @return Query
     */

public function findAllBy(SearchBook $search):Query
    {

       /* condition des requette pour la recherche de livres'*/

        $query= $this->createQueryBuilder('e');

        if ($search->getLivre()){
            $query = $query
                ->andWhere('e.livre = :livre')
                -> setParameter('livre', $search->getLivre());
        }


        if ($search->getUser()){
            $query = $query
                ->andWhere('e.user = :user')
                -> setParameter('user', $search->getUser());
        }

        if ($search->getCategorie()){
            $query = $query
                ->andWhere('e.categorie = :categorie')
                -> setParameter('categorie', $search->getCategorie());
        }

        if ($search->getDate()){
            $query = $query
                ->andWhere('e.date = :date')
                -> setParameter('date', $search->getDate());
        }

        return $query->getQuery();

    }








    /***
     * @return Query
     */

    /*public function findAllBy(SearchBook $search)
    {
        return $this->createQueryBuilder('e')


        

                 ->andWhere('e.livre = :Livre')
                -> setParameter('Livre',$search->getLivre())
                 ->andWhere('e.user = :User')
                 -> setParameter('User',$search->getUser())
                ->andWhere('e.categorie= :Categorie')
                 -> setParameter('Categorie',$search->getCategorie())
               ->andWhere('e.date <= :Date')
                -> setParameter('Date',$search->getDate())
                ->getQuery()
                ->getResult();
                //->orderBy('e.date', 'DESC')


}*/





}
