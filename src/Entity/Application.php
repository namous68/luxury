<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $appliedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $offer = null;

    #[ORM\Column(length: 255)]
    private ?string $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppliedAt(): ?\DateTimeImmutable
    {
        return $this->appliedAt;
    }

    public function setAppliedAt(\DateTimeImmutable $appliedAt): static
    {
        $this->appliedAt = $appliedAt;

        return $this;
    }

    public function getOffer(): ?string
    {
        return $this->offer;
    }

    public function setOffer(string $offer): static
    {
        $this->offer = $offer;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }
}
