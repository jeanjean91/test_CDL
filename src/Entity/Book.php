<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $livre;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Categorys::class, inversedBy="livre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="book")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivre(): ?string
    {
        return $this->livre;
    }

    public function setLivre(?string $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCategorie(): ?Categorys
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorys $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
