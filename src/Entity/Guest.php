<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\OpenApi\Model;
use ApiPlatform\Metadata\Post;
use App\Controller\CreateGuestsListController;
use App\Controller\CreateMultipleGuestsController;
use App\Dto\GuestMultipleRequest;
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
        new Post(
            uriTemplate: '/guests/multiple',
            controller: CreateMultipleGuestsController::class,
            openapi: new Model\Operation(
                summary: 'Create a list of guests',
                description: 'Creates at once multiple guest entries, in a batch',
                requestBody: new Model\RequestBody(
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                'type' => 'object',
                                'properties' => [
                                    'guests' => [
                                        'type' => 'array',
                                        'items' => [
                                            "type" => "object",
                                            "properties" => [
                                                'name' => [
                                                    'type' => 'string',
                                                    'example' => 'john',
                                                ],
                                                'surname' => [
                                                    'type' => 'string',
                                                    'example' => 'doe',
                                                ],
                                                'birthdate' => [
                                                    'type' => 'datetime',
                                                    'example' => '15-05-80',
                                                ],
                                                'gender' => [
                                                    'type' => 'array',
                                                    'example' => '["GENDER_MALE"]',
                                                ],
                                                'passportId' => [
                                                    'type' => 'string',
                                                    'example' => 'A12345678',
                                                ],
                                                'country' => [
                                                    'type' => 'string',
                                                    'example' => 'ES',
                                                ],
                                                'checkIn' => [
                                                    'type' => 'Date',
                                                    'example' => '16-07-2024 12:00',
                                                ],
                                                'checkOut' => [
                                                    'type' => 'Date',
                                                    'example' => '18-07-2024 14:00',
                                                ],
                                            ]
                                        ],
                                    ],

                                ],
                            ],
                        ],
                    ]),
                )
            ),
            input: GuestMultipleRequest::class,
            name: 'multiple_guests'
        ),


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

    #[ORM\ManyToOne(inversedBy: 'guests', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $registrar = null;

    /**
     * @var Collection<int, Registration>
     */
    #[ORM\ManyToMany(targetEntity: Registration::class, mappedBy: 'guests')]
    private Collection $registrations;

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

    public function getRegistrar(): ?user
    {
        return $this->registrar;
    }

    public function setRegistrar(?user $registrar): static
    {
        $this->registrar = $registrar;

        return $this;
    }

    public function addRegistration(Registration $registration): static
    {
        if (!$this->registrations->contains($registration)) {
            $this->registrations->add($registration);
            $registration->addGuest($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): static
    {
        if ($this->registrations->removeElement($registration)) {
            $registration->removeGuest($this);
        }

        return $this;
    }

}
