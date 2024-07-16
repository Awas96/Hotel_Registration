<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class GuestMultipleRequest.
 *
 * Custom input DTO to wrap multiple Group request.
 */
final class GuestMultipleRequest
{

    #[Groups(["Guest_multiple_create"])]
    #[Assert\NotBlank(groups: ["Guest_multiple_create"])]
    #[Assert\unique(groups: ["Guest_multiple_create"])]
    protected ?array $guests = null;

    public function __construct(?array $guests)
    {
        $this->guests = $guests;
    }

    public function getGuests(): ?array
    {
        return $this->guests;
    }

}
