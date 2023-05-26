<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $matricule_client = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_client = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_client = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe_client = null;

    #[ORM\Column(length: 255)]
    private ?string $datenaissance_client = null;

    #[ORM\Column(length: 255)]
    private ?string $email_client = null;

    #[ORM\Column(length: 255)]
    private ?string $contact_client = null;

    #[ORM\Column(length: 255)]
    private ?string $num_pieces_client = null;

    #[ORM\Column(length: 255)]
    private ?string $satut_client = null;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?employe $employe = null;

    #[ORM\ManyToOne(inversedBy: 'client')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatriculeClient(): ?string
    {
        return $this->matricule_client;
    }

    public function setMatriculeClient(string $matricule_client): self
    {
        $this->matricule_client = $matricule_client;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nom_client;
    }

    public function setNomClient(string $nom_client): self
    {
        $this->nom_client = $nom_client;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenom_client;
    }

    public function setPrenomClient(string $prenom_client): self
    {
        $this->prenom_client = $prenom_client;

        return $this;
    }

    public function getSexeClient(): ?string
    {
        return $this->sexe_client;
    }

    public function setSexeClient(string $sexe_client): self
    {
        $this->sexe_client = $sexe_client;

        return $this;
    }

    public function getDatenaissanceClient(): ?string
    {
        return $this->datenaissance_client;
    }

    public function setDatenaissanceClient(string $datenaissance_client): self
    {
        $this->datenaissance_client = $datenaissance_client;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->email_client;
    }

    public function setEmailClient(string $email_client): self
    {
        $this->email_client = $email_client;

        return $this;
    }

    public function getContactClient(): ?string
    {
        return $this->contact_client;
    }

    public function setContactClient(string $contact_client): self
    {
        $this->contact_client = $contact_client;

        return $this;
    }

    public function getNumPiecesClient(): ?string
    {
        return $this->num_pieces_client;
    }

    public function setNumPiecesClient(string $num_pieces_client): self
    {
        $this->num_pieces_client = $num_pieces_client;

        return $this;
    }

    public function getSatutClient(): ?string
    {
        return $this->satut_client;
    }

    public function setSatutClient(string $satut_client): self
    {
        $this->satut_client = $satut_client;

        return $this;
    }

    public function getEmploye(): ?employe
    {
        return $this->employe;
    }

    public function setEmploye(?employe $employe): self
    {
        $this->employe = $employe;

        return $this;
    }

    public function getClient(): ?Location
    {
        return $this->client;
    }

    public function setClient(?Location $client): self
    {
        $this->client = $client;

        return $this;
    }
}
