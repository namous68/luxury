<?php

namespace App\Entity;

use App\Repository\GendreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GendreRepository::class)]
class Gendre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $gendre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGendre(): ?string
    {
        return $this->gendre;
    }

    public function setGendre(string $gendre): static
    {
        $this->gendre = $gendre;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getGendre();
    }
}
