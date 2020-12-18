<?php


namespace App\Entity;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;


class SearchBook
{



    /**
     * @var Type = 'datetime'
     */

    private $date;


    /**
     * @var Type = 'String'
     */


    private $livre;



    /**
     * @var Type = 'String'
     */


    Private $user;



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
     * @return datetime|SearchBook
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string|mixed
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * @param mixed $nomLivre
     * @return string|SearchBook
     */
    public function setLivre($livre)
    {
        $this->livre = $livre;
        return $this;
    }

    /**
     * @return string\mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $auteur
     * @return string\SearchBook
     */
    public function setUser($user)
    {
        $this->user = $user;
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
        return $this->user;
        return $this->livre;
        return $this->categorie;
        return $this->date;
        // to show the id of the Category in the select
        // return $this->id;
    }




}





