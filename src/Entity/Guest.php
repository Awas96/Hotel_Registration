<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\GuestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GuestRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new getCollection(),
    ]
)]
class Guest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 100, maxMessage: ' Your name must not exceed :max characters in length.')]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 100, maxMessage: ' Your surname must not exceed :max characters in length.')]
    private ?string $surname = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y'])]
    #[Assert\NotBlank]
    #[Assert\Datetime]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private array $gender = [];

    #[ORM\Column(length: 255)]
    #[Assert\Regex('/^[A-z0-9]{2,3}[0-9]{6}$/', message: "Your passport identification must be a valid EU passport")]
    private ?string $passportId = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    /**
     * @var Collection<int, Registration>
     */
    #[ORM\OneToMany(targetEntity: Registration::class, mappedBy: 'guest', orphanRemoval: true)]
    private Collection $registrations;

    #[ORM\ManyToOne(inversedBy: 'guests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $registrar = null;

    public function __construct()
    {
        $this->registrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getGender(): array
    {
        return $this->gender;
    }

    public function setGender(array $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPassportId(): ?string
    {
        return $this->passportId;
    }

    public function setPassportId(string $passportId): static
    {
        $this->passportId = $passportId;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }


    /**
     * @return Collection<int, Registration>
     */
    public function getRegistrations(): Collection
    {
        return $this->registrations;
    }

    public function addRegistration(Registration $registration): static
    {
        if (!$this->registrations->contains($registration)) {
            $this->registrations->add($registration);
            $registration->setGuest($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): static
    {
        if ($this->registrations->removeElement($registration)) {
            // set the owning side to null (unless already changed)
            if ($registration->getGuest() === $this) {
                $registration->setGuest(null);
            }
        }

        return $this;
    }

    public function getRegistrar(): ?user
    {
        return $this->registrar;
    }

    public function setRegistrar(?user $registrar): static
    {
        $this->registrar = $registrar;

        return $this;
    }

}
