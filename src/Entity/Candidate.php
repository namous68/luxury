<?php

namespace App\Entity;
use App\Entity\Experience;
use App\Entity\Gendre;
use App\Entity\Category;

use App\Repository\CandidateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
class Candidate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FirstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Adress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nationality = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CurrentLocation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PlaceOfBirth = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Availability = null;

    #[ORM\ManyToOne(inversedBy: 'candidate')]
    private ?Experience $experience = null;

    #[ORM\ManyToOne(inversedBy: 'joboffer')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Category $category = null;

    #[ORM\OneToOne(inversedBy: 'candidate', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isPassportValid = null;

    #[ORM\OneToMany(mappedBy: 'candidate', targetEntity: Application::class, orphanRemoval: true)]
    private Collection $applications;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateOfBirth = null;

    #[ORM\ManyToOne(inversedBy: 'candidates')]
    private ?Gendre $gender = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $passportFile = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $curriculumVitae = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $profilePicture = null;

    public function __construct()
    {
        $this->applications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): static
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): static
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): static
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): static
    {
        $this->Country = $Country;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->Nationality;
    }

    public function setNationality(string $Nationality): static
    {
        $this->Nationality = $Nationality;

        return $this;
    }

    public function getPassportFile(): ?string
    {
        return $this->passportFile;
    }

    public function setPassportFile(string $passportFile): static
    {
        $this->passportFile = $passportFile;

        return $this;
    }

    public function getCurriculumVitae(): ?string
    {
        return $this->curriculumVitae;
    }

    public function setCurriculumVitae(string $CurriculumVitae): static
    {
        $this->curriculumVitae = $CurriculumVitae;

        return $this;
    }

    public function getProfilPicture(): ?string
    {
        return $this->profilePicture;
    }

    public function setProfilPicture(string $ProfilPicture): static
    {
        $this->profilePicture = $ProfilPicture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->CurrentLocation;
    }

    public function setCurrentLocation(string $CurrentLocation): static
    {
        $this->CurrentLocation = $CurrentLocation;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->PlaceOfBirth;
    }

    public function setPlaceOfBirth(string $PlaceOfBirth): static
    {
        $this->PlaceOfBirth = $PlaceOfBirth;

        return $this;
    }

    public function isAvailability(): ?bool
    {
        return $this->Availability;
    }

    public function setAvailability(bool $Availability): static
    {
        $this->Availability = $Availability;

        return $this;
    }

    public function getExperience(): ?Experience
    {
        return $this->experience;
    }

    public function setExperience(?Experience $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getGendre(): ?Gendre
    {
        return $this->gender;
    }

    public function setGendre(?Gendre $gendre): static
    {
        $this->gender = $gendre;

        return $this;
    }

    public function isIsPassportValid(): ?bool
    {
        return $this->isPassportValid;
    }

    public function setIsPassportValid(?bool $isPassportValid): static
    {
        $this->isPassportValid = $isPassportValid;

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getApplications(): Collection
    {
        return $this->applications;
    }

    public function addApplication(Application $application): static
    {
        if (!$this->applications->contains($application)) {
            $this->applications->add($application);
            $application->setCandidate($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): static
    {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getCandidate() === $this) {
                $application->setCandidate(null);
            }
        }

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeImmutable $dateOfBirth): static
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getGender(): ?Gendre
    {
        return $this->gender;
    }

    public function setGender(?Gendre $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getProfilePicture(): ?Image
    {
        return $this->profilePicture;
    }

    public function setProfilePicture(?Image $profilePicture): static
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    
}
