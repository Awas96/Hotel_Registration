<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RegistrationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RegistrationRepository::class)]
class Registration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y H:i'])]
    #[Assert\NotBlank]
    #[Assert\Date]
    private ?\DateTimeInterface $checkIn = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y H:i'])]
    #[Assert\NotBlank]
    #[Assert\Date]
    private ?\DateTimeInterface $checkOut = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckIn(): ?\DateTimeInterface
    {
        return $this->checkIn;
    }

    public function setCheckIn(\DateTimeInterface $checkIn): static
    {
        $this->checkIn = $checkIn;

        return $this;
    }

    public function getCheckOut(): ?\DateTimeInterface
    {
        return $this->checkOut;
    }

    public function setCheckOut(\DateTimeInterface $checkOut): static
    {
        $this->checkOut = $checkOut;

        return $this;
    }

}
