<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $matricule_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $fonction_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $email_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe_employe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datenaissance_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $contact_employe = null;

    #[ORM\OneToMany(mappedBy: 'employe', targetEntity: Client::class, orphanRemoval: true)]
    private Collection $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatriculeEmploye(): ?string
    {
        return $this->matricule_employe;
    }

    public function setMatriculeEmploye(string $matricule_employe): self
    {
        $this->matricule_employe = $matricule_employe;

        return $this;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nom_employe;
    }

    public function setNomEmploye(string $nom_employe): self
    {
        $this->nom_employe = $nom_employe;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenom_employe;
    }

    public function setPrenomEmploye(string $prenom_employe): self
    {
        $this->prenom_employe = $prenom_employe;

        return $this;
    }

    public function getFonctionEmploye(): ?string
    {
        return $this->fonction_employe;
    }

    public function setFonctionEmploye(string $fonction_employe): self
    {
        $this->fonction_employe = $fonction_employe;

        return $this;
    }

    public function getEmailEmploye(): ?string
    {
        return $this->email_employe;
    }

    public function setEmailEmploye(string $email_employe): self
    {
        $this->email_employe = $email_employe;

        return $this;
    }

    public function getSexeEmploye(): ?string
    {
        return $this->sexe_employe;
    }

    public function setSexeEmploye(string $sexe_employe): self
    {
        $this->sexe_employe = $sexe_employe;

        return $this;
    }

    public function getDatenaissanceEmploye(): ?\DateTimeInterface
    {
        return $this->datenaissance_employe;
    }

    public function setDatenaissanceEmploye(\DateTimeInterface $datenaissance_employe): self
    {
        $this->datenaissance_employe = $datenaissance_employe;

        return $this;
    }

    public function getContactEmploye(): ?string
    {
        return $this->contact_employe;
    }

    public function setContactEmploye(string $contact_employe): self
    {
        $this->contact_employe = $contact_employe;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->setEmploye($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getEmploye() === $this) {
                $client->setEmploye(null);
            }
        }

        return $this;
    }
}
