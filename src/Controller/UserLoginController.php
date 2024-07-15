<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserLoginController extends AbstractController
{
    #[Route(
        path: 'user/create/',
        name: 'app_user_create',
        defaults: [
            'api_resource_class' => User::class,
            'api_operation_name' => '_api_/user/create',
        ],
        methods: ['POST'],
    )]
    public function __invoke(User $user): User
    {
        var_dump("hoh");
    }
}
