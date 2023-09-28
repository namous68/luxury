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
    private ?string $societyName = null;

    #[ORM\Column(length: 255)]
    private ?string $nameContact = null;

    #[ORM\Column(length: 255)]
    private ?string $mailContact = null;

   

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $PhoneNumberContact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getNameContact(): ?string
    {
        return $this->nameContact;
    }

    public function setNameContact(string $nameContact): static
    {
        $this->nameContact = $nameContact;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->mailContact;
    }

    public function setMailContact(string $mailContact): static
    {
        $this->mailContact = $mailContact;

        return $this;
    }



    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPhoneNumberContact(): ?string
    {
        return $this->PhoneNumberContact;
    }

    public function setPhoneNumberContact(string $PhoneNumberContact): static
    {
        $this->PhoneNumberContact = $PhoneNumberContact;

        return $this;
    }
}
