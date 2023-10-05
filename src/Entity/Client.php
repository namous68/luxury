<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use App\Entity\Offer;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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
    private ?string $typeofActivity = null;

    #[ORM\Column(length: 255)]
    private ?string $nameContact = null;

    #[ORM\Column(length: 255)]
    private ?string $contactPosition = null;

    #[ORM\Column(length: 255)]
    private ?string $PhoneNumberContact = null;

    #[ORM\Column(length: 255)]
    private ?string $mailContact = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Offer::class)]
    private Collection $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
    }

    public function __toString()
    {
        return $this->societyName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getsocietyName(): ?string
    {
        return $this->societyName;
    }

    public function setsocietyName(string $societyName): static
    {
        $this->societyName = $societyName;

        return $this;
    }

    public function getTypeofActivity(): ?string
    {
        return $this->typeofActivity;
    }

    public function setTypeofActivity(string $typeofActivity): static
    {
        $this->typeofActivity = $typeofActivity;

        return $this;
    }

    public function getnameContact(): ?string
    {
        return $this->nameContact;
    }

    public function setnameContact(string $nameContact): static
    {
        $this->nameContact = $nameContact;

        return $this;
    }

    public function getContactPosition(): ?string
    {
        return $this->contactPosition;
    }

    public function setContactPosition(string $contactPosition): static
    {
        $this->contactPosition = $contactPosition;

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

    public function getmailContact(): ?string
    {
        return $this->mailContact;
    }

    public function setmailContact(string $mailContact): static
    {
        $this->mailContact = $mailContact;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return Collection<int, Offer>
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): static
    {
        if (!$this->offers->contains($offer)) {
            $this->offers->add($offer);
            $offer->setClient($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): static
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getClient() === $this) {
                $offer->setClient(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
