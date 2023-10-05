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
    private ?string $url = null;

    #[ORM\Column(length: 255)]
    private ?string $originalName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of originalName
     */ 
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Set the value of originalName
     *
     * @return  self
     */ 
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;

        return $this;
    }
}
