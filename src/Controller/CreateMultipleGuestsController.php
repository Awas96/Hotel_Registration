<?php

namespace App\Controller;

use ApiPlatform\Symfony\Validator\Validator;
use App\Dto\GuestMultipleRequest;
use App\Entity\Guest;
use App\Handler\GuestsValidationHandler;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;
use mysql_xdevapi\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[AsController]
class CreateMultipleGuestsController extends AbstractController
{

    public function __construct()
    {
    }

    #[
        Route(
            path: "/guests/multiple",
            name: "multiple_guests",
            methods: ["POST"],
        )]
    public function __invoke(\Symfony\Component\HttpFoundation\Request $request, EntityManagerInterface $entityManager,GuestsValidationHandler $guestsValidationHandler): JsonResponse
    {
        $guests = json_decode($request->getContent());
        foreach ($guests as $newGuest) {

            //checks a single guest
            $guest = $guestsValidationHandler->handle($newGuest);
            is_null($guest) ?: $entityManager->persist($guest);

        }

        $entityManager->flush();
        return $this->json("done");
    }


}
