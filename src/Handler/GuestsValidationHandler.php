<?php

namespace App\Handler;

namespace App\Handler;

use App\Entity\guest;
use App\Handler\GuestsMailHandler;
use App\Entity\Registration;
use Doctrine\ORM\EntityManagerInterface;
use mysql_xdevapi\Exception;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GuestsValidationHandler
{
    private Security $security;
    private ValidatorInterface $validator;
    private EntityManagerInterface $entityManager;
    private GuestsMailHandler $guestsMailHandler;

    public function __construct(Security $security, ValidatorInterface $validator, EntityManagerInterface $entityManager, GuestsMailHandler $guestsMailHandler)
    {
        $this->security = $security;
        $this->validator = $validator;
        $this->entityManager = $entityManager;
        $this->guestsMailHandler = $guestsMailHandler;
    }

    public function handle(object $dataCollection): string
    {
        $errorCollector = [];
        $registeredGuests =[];

        //Create registration initially to include it with every guest generated in bulk.
        try {
            foreach ($dataCollection->guests as $data) {

                // Generate a new guest profile.
                $guest = new Guest();
                $guest->setName($data->name);
                $guest->setSurname($data->surname);
                $guest->setGender($data->gender);
                $guest->setBirthdate(new \DateTime(date("d-m-Y", strtotime($data->birthdate))));
                $guest->setPassportId($data->passportId);
                $guest->setCountry($data->country);
                $guest->setRegistrar($this->security->getUser());
                //registration details
                $registration = new Registration();
                $registration->setCheckIn(new \DateTime(date("d-m-Y H:i", strtotime($data->checkIn))));
                $registration->setCheckOut(new \DateTime(date("d-m-Y H:i", strtotime($data->checkOut))));

                //Verify the data.
                $errors = $this->validator->validate($guest);
                foreach ($errors as $error) {
                    $errorCollector[] = (object)[$error->getPropertyPath(), $error->getMessage(), $error->getInvalidValue()];
                }

                //Persist guest in database if no errors are present.
                if ($errors->count() < 1) {
                    $this->entityManager->persist($guest);
                    $registration->addGuest($guest);
                    $this->entityManager->persist($registration);
                    $registeredGuests[] = [$guest->getName(),$guest->getSurname(), date("d-m-Y H:i", strtotime($data->checkIn)), date("d-m-Y H:i", strtotime($data->checkOut))];
                }
            }
        } catch (Exception $e) {
            throw new exception($e->getMessage());
        }
        $this->guestsMailHandler->handle($registeredGuests);
        $this->entityManager->flush();
        return json_encode($errorCollector);
    }
}