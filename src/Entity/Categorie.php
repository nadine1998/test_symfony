<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Scpi::class)]
    private $scpis;

    public function __construct()
    {
        $this->scpis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection|Scpi[]
     */
    public function getScpis(): Collection
    {
        return $this->scpis;
    }

    public function addScpi(Scpi $scpi): self
    {
        if (!$this->scpis->contains($scpi)) {
            $this->scpis[] = $scpi;
            $scpi->setCategorie($this);
        }

        return $this;
    }

    public function removeScpi(Scpi $scpi): self
    {
        if ($this->scpis->removeElement($scpi)) {
            // set the owning side to null (unless already changed)
            if ($scpi->getCategorie() === $this) {
                $scpi->setCategorie(null);
            }
        }

        return $this;
    }
}
