<?php

namespace App\Entity;

use App\Repository\ScpiRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: ScpiRepository::class)]
class Scpi
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
    private $tdvm;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Positive]
    #[Assert\Type('numeric')]
    private $prix_part;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Positive]
    #[Assert\Type('numeric')]
    private $capitalisation;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Positive]
    #[Assert\Type('numeric')]
    private $taux_occupation;

    #[ORM\Column(type: 'string', length: 255)]
    private $valeur_retrait;

    #[ORM\Column(type: 'string', length: 255)]
  
    private $annee_creation;

    #[ORM\ManyToOne(targetEntity: SocieteDeGestion::class, inversedBy: 'scpis')]
    #[ORM\JoinColumn(onDelete:'CASCADE')]
  
    private $societe_de_gestion;

    #[ORM\Column(type: 'string', length: 255)]
    private $localisation;

    #[ORM\Column(type: 'boolean')]
    private $assurance_vie;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'scpis')]
    private $categorie;

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

    public function getTdvm(): ?string
    {
        return $this->tdvm;
    }

    public function setTdvm(string $tdvm): self
    {
        $this->tdvm = $tdvm;

        return $this;
    }

    public function getPrixPart(): ?string
    {
        return $this->prix_part;
    }

    public function setPrixPart(string $prix_part): self
    {
        $this->prix_part = $prix_part;

        return $this;
    }

    public function getCapitalisation(): ?string
    {
        return $this->capitalisation;
    }

    public function setCapitalisation(string $capitalisation): self
    {
        $this->capitalisation = $capitalisation;

        return $this;
    }

    public function getTauxOccupation(): ?string
    {
        return $this->taux_occupation;
    }

    public function setTauxOccupation(string $taux_occupation): self
    {
        $this->taux_occupation = $taux_occupation;

        return $this;
    }

    public function getValeurRetrait(): ?string
    {
        return $this->valeur_retrait;
    }

    public function setValeurRetrait(string $valeur_retrait): self
    {
        $this->valeur_retrait = $valeur_retrait;

        return $this;
    }

    public function getAnneeCreation(): ?string
    {
        return $this->annee_creation;
    }

    public function setAnneeCreation(string $annee_creation): self
    {
        $this->annee_creation = $annee_creation;

        return $this;
    }

    public function getSocieteDeGestion(): ?SocieteDeGestion
    {
        return $this->societe_de_gestion;
    }

    public function setSocieteDeGestion(?SocieteDeGestion $societe_de_gestion): self
    {
        $this->societe_de_gestion = $societe_de_gestion;

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getAssuranceVie(): ?bool
    {
        return $this->assurance_vie;
    }

    public function setAssuranceVie(bool $assurance_vie): self
    {
        $this->assurance_vie = $assurance_vie;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
