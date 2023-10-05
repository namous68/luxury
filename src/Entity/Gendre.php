<?php

namespace App\Entity;

use App\Repository\GendreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'gender', targetEntity: Candidate::class)]
    private Collection $candidates;

    public function __construct()
    {
        $this->candidates = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Candidate>
     */
    public function getCandidates(): Collection
    {
        return $this->candidates;
    }

    public function addCandidate(Candidate $candidate): static
    {
        if (!$this->candidates->contains($candidate)) {
            $this->candidates->add($candidate);
            $candidate->setGender($this);
        }

        return $this;
    }

    public function removeCandidate(Candidate $candidate): static
    {
        if ($this->candidates->removeElement($candidate)) {
            // set the owning side to null (unless already changed)
            if ($candidate->getGender() === $this) {
                $candidate->setGender(null);
            }
        }

        return $this;
    }
    
}
