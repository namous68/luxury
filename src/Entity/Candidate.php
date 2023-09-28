<?php

namespace App\Entity;
use App\Entity\Experience;

use App\Repository\CandidateRepository;
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
    private ?string $gendre = null;

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

    #[ORM\Column(nullable: true)]
    private ?bool $passport = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $passportFile = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $CurriculumVitae = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $ProfilPicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CurrentLocation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PlaceOfBirth = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $EmailAdress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

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

    public function isPassport(): ?bool
    {
        return $this->passport;
    }

    public function setPassport(bool $passport): static
    {
        $this->passport = $passport;

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
        return $this->CurriculumVitae;
    }

    public function setCurriculumVitae(string $CurriculumVitae): static
    {
        $this->CurriculumVitae = $CurriculumVitae;

        return $this;
    }

    public function getProfilPicture(): ?string
    {
        return $this->ProfilPicture;
    }

    public function setProfilPicture(string $ProfilPicture): static
    {
        $this->ProfilPicture = $ProfilPicture;

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

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): static
    {
        $this->dateOfBirth = $dateOfBirth;

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

    public function getEmailAdress(): ?string
    {
        return $this->EmailAdress;
    }

    public function setEmailAdress(string $EmailAdress): static
    {
        $this->EmailAdress = $EmailAdress;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

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

    
}
