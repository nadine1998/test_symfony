<?php

namespace App\Entity;

use App\Repository\SocieteDeGestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SocieteDeGestionRepository::class)]
class SocieteDeGestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Your first name must be at least {{ limit }} characters long',
        maxMessage: 'Your first name cannot be longer than {{ limit }} characters',
    )]
    #[Assert\Regex('/^[A-Za-z]([a-zA-Z0-9]|[- @\.#&!])*$/')]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\Column(type: 'date')]
    private $date_creation;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Type('numeric')]
    private $effectifs;

    #[ORM\OneToMany(mappedBy: 'societe_de_gestion', targetEntity: Scpi::class)]
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getEffectifs(): ?string
    {
        return $this->effectifs;
    }

    public function setEffectifs(string $effectifs): self
    {
        $this->effectifs = $effectifs;

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
            $scpi->setSocieteDeGestion($this);
        }

        return $this;
    }

    public function removeScpi(Scpi $scpi): self
    {
        if ($this->scpis->removeElement($scpi)) {
            // set the owning side to null (unless already changed)
            if ($scpi->getSocieteDeGestion() === $this) {
                $scpi->setSocieteDeGestion(null);
            }
        }

        return $this;
    }
}
