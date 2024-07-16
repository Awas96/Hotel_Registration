<?php

namespace App\Controller;

use App\Handler\GuestsValidationHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
    public function __invoke(Request $request,GuestsValidationHandler $guestsValidationHandler): JsonResponse
    {
        $dataCollection = json_decode($request->getContent());
        $response = $guestsValidationHandler->handle($dataCollection);
        dump(json_decode($response));


        return $this->json("done");
    }


}
