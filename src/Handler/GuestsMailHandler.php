<?php

namespace App\Handler;

namespace App\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
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
        $list = "<ul>";
        foreach ($guestList as $guest) {
            $list .= sprintf("<li>%s %s - From: %s Until: %s  </li>", $guest[0], $guest[1], $guest[2], $guest[3]);
        }
        $list .= "</ul>";

        $email = (new Email())
            ->from('hotel_staff@gmail.com')
            ->to($this->security->getUser()->getEmail())
            ->subject('New list of Guests')
            ->html("the new guests are as follows: " . $list);

        $this->mailer->send(($email));
    }
}