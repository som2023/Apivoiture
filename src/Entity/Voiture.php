<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $serie = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    #[ORM\Column]
    private ?int $nombre_place = null;

    #[ORM\Column(length: 255)]
    private ?string $disponible = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'voiture', targetEntity: Location::class, orphanRemoval: true)]
    private Collection $voiture;

    public function __construct()
    {
        $this->voiture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getNombrePlace(): ?int
    {
        return $this->nombre_place;
    }

    public function setNombrePlace(int $nombre_place): self
    {
        $this->nombre_place = $nombre_place;

        return $this;
    }

    public function getDisponible(): ?string
    {
        return $this->disponible;
    }

    public function setDisponible(string $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getVoiture(): Collection
    {
        return $this->voiture;
    }

    public function addVoiture(Location $voiture): self
    {
        if (!$this->voiture->contains($voiture)) {
            $this->voiture->add($voiture);
            $voiture->setVoiture($this);
        }

        return $this;
    }

    public function removeVoiture(Location $voiture): self
    {
        if ($this->voiture->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getVoiture() === $this) {
                $voiture->setVoiture(null);
            }
        }

        return $this;
    }
}
