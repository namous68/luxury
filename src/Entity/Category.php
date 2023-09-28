<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: candidate::class)]
    private Collection $joboffer;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: candidate::class)]
    private Collection $candidate;

    public function __construct()
    {
        $this->joboffer = new ArrayCollection();
        $this->candidate = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, candidate>
     */
    public function getJoboffer(): Collection
    {
        return $this->joboffer;
    }

    public function addJoboffer(candidate $joboffer): static
    {
        if (!$this->joboffer->contains($joboffer)) {
            $this->joboffer->add($joboffer);
            $joboffer->setCategory($this);
        }

        return $this;
    }

    public function removeJoboffer(candidate $joboffer): static
    {
        if ($this->joboffer->removeElement($joboffer)) {
            // set the owning side to null (unless already changed)
            if ($joboffer->getCategory() === $this) {
                $joboffer->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, candidate>
     */
    public function getCandidate(): Collection
    {
        return $this->candidate;
    }

    public function addCandidate(candidate $candidate): static
    {
        if (!$this->candidate->contains($candidate)) {
            $this->candidate->add($candidate);
            $candidate->setCategory($this);
        }

        return $this;
    }

    public function removeCandidate(candidate $candidate): static
    {
        if ($this->candidate->removeElement($candidate)) {
            // set the owning side to null (unless already changed)
            if ($candidate->getCategory() === $this) {
                $candidate->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getCategory();
    }
}
