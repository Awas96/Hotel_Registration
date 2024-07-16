<?php

namespace App\Handler;

namespace App\Handler;

use App\Entity\guest;
use mysql_xdevapi\Exception;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GuestsValidationHandler
{
    private Security $security;
    private ValidatorInterface $validator;

    public function __construct(Security $security, ValidatorInterface $validator)
    {
        $this->security = $security;
        $this->validator = $validator;
    }

    public function handle(object $data): ?Guest
    {
        try {
            $guest = new Guest();
            $guest->setName($data->name);
            $guest->setSurname($data->surname);
            $guest->setGender($data->gender);
            $guest->setBirthdate(new \DateTime(date("d-m-Y", strtotime($data->birthdate))));
            $guest->setPassportId($data->passportId);
            $guest->setCountry($data->country);
            $guest->setRegistrar($this->security->getUser());

            //Validate data
            $errors = $this->validator->validate($guest);
            if ($errors->count() < 1) return $guest;
            else return null;

        } catch (Exception $e) {
            throw new exception($e->getMessage());
        }
    }
}