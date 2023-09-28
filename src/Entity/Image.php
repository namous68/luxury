<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imageData = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageData(): ?string
    {
        return $this->imageData;
    }

    public function setImageData(string $imageData): static
    {
        $this->imageData = $imageData;

        return $this;
    }
}
