<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $titreOffer = null;

    #[ORM\Column(length: 255)]
    private ?string $societyName = null;

    #[ORM\Column(length: 255)]
    private ?string $contact = null;

    #[ORM\Column(length: 255)]
    private ?string $contactMail = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DepositeDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTitreOffer(): ?string
    {
        return $this->titreOffer;
    }

    public function setTitreOffer(string $titreOffer): static
    {
        $this->titreOffer = $titreOffer;

        return $this;
    }

    public function getSocietyName(): ?string
    {
        return $this->societyName;
    }

    public function setSocietyName(string $societyName): static
    {
        $this->societyName = $societyName;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getContactMail(): ?string
    {
        return $this->contactMail;
    }

    public function setContactMail(string $contactMail): static
    {
        $this->contactMail = $contactMail;

        return $this;
    }

    public function getDepositeDate(): ?\DateTimeInterface
    {
        return $this->DepositeDate;
    }

    public function setDepositeDate(\DateTimeInterface $DepositeDate): static
    {
        $this->DepositeDate = $DepositeDate;

        return $this;
    }
}
