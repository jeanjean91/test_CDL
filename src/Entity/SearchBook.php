<?php


namespace App\Entity;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;


class SearchBook
{



    /**
     * @var Type = 'datetime'
     */

    private $date;


    /**
     * @var Type = 'String'
     */


    private $nomLivre;



    /**
     * @var Type = 'String'
     */


    Private $auteur;



    /**
     * @var Type = 'String'
     */


    Private $categorie;





    /**
     * @return datetime| mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return datetime|EvenementSearch
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string|mixed
     */
    public function getNomLivre()
    {
        return $this->nomLivre;
    }

    /**
     * @param mixed $nomLivre
     * @return string|SearchBook
     */
    public function setNomLivre($nomLivre)
    {
        $this->city = $nomLivre;
        return $this;
    }

    /**
     * @return string\mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     * @return string\SearchBook
     */
    public function setAuteur($auteur)
    {
        $this->contry = $auteur;
        return $this;
    }

    /**
     * @return string\mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     * @return string\SearchBook
     */
    public function setCategorie($categorie)
    {
        $this->type = $categorie;
        return $this;
    }


    public function __toString(){
        // to show the name of the Category in the select
        return $this->auteur;
        return $this->nomLivre;
        return $this->categorie;
        return $this->date;
        // to show the id of the Category in the select
        // return $this->id;
    }




}





