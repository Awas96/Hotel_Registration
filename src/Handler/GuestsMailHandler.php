<?php

namespace App\Handler;

namespace App\Handler;

use App\Entity\guest;
use App\Entity\Registration;
use Doctrine\ORM\EntityManagerInterface;
use mysql_xdevapi\Exception;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GuestsMailHandler
{
    private Security $security;
    private ValidatorInterface $validator;
    private EntityManagerInterface $entityManager;

    public function __construct(
        private MailerInterface $mailer,
        Security                $security,
    )
    {
        $this->security = $security;
    }

    public function handle($guestList): void
    {
        $email = (new Email())
            ->from('hotel_staff@gmail.com')
            ->to($this->security->getUser()->getEmail())
            ->subject('New list of Guests')
            ->text("the new guests are as follows: " . json_encode($guestList));

        $this->mailer->send(($email));
    }
}