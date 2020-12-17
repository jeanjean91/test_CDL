<?php

namespace App\Entity;

use App\Repository\CategorysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorysRepository::class)
 */
class Categorys
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
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Book::class, mappedBy="categorie", orphanRemoval=true)
     */
    private $livre;

    public function __construct()
    {

        $this->livre = new ArrayCollection();
    }
    public function __toString() {
    return $this->categorie;
}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getLivre(): Collection
    {
        return $this->livre;
    }

    public function addLivre(Book $livre): self
    {
        if (!$this->livre->contains($livre)) {
            $this->livre[] = $livre;
            $livre->setCategorie($this);
        }

        return $this;
    }

    public function removeLivre(Book $livre): self
    {
        if ($this->livre->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getCategorie() === $this) {
                $livre->setCategorie(null);
            }
        }

        return $this;
    }
}
