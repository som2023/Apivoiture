<?php

namespace App\Entity;

use App\Entity\Voiture;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LocationRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_retour = null;

    #[ORM\Column]
    private ?int $prix_location = null;

    #[ORM\ManyToOne(inversedBy: 'voiture')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Voiture $voiture = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: client::class, orphanRemoval: true)]
    private Collection $client;

    public function __construct()
    {
        $this->client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->date_retour;
    }

    public function setDateRetour(\DateTimeInterface $date_retour): self
    {
        $this->date_retour = $date_retour;

        return $this;
    }

    public function getPrixLocation(): ?int
    {
        return $this->prix_location;
    }

    public function setPrixLocation(int $prix_location): self
    {
        $this->prix_location = $prix_location;

        return $this;
    }

    public function getVoiture(): ?voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?voiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * @return Collection<int, client>
     */
    public function getClient(): Collection
    {
        return $this->client;
    }

    public function addClient(client $client): self
    {
        if (!$this->client->contains($client)) {
            $this->client->add($client);
            $client->setClient($this);
        }

        return $this;
    }

    public function removeClient(client $client): self
    {
        if ($this->client->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getClient() === $this) {
                $client->setClient(null);
            }
        }

        return $this;
    }
}
