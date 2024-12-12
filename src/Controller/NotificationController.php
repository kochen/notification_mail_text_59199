<?php

declare(strict_types=1);

namespace App\Controller;

use App\Notification\InternalNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;
use Symfony\Component\Routing\Attribute\Route;

final class NotificationController extends AbstractController
{
    public function __construct(
        private NotifierInterface $notifier,
    ) {
    }

    #[Route('/notify', name: 'app_notify')]
    public function __invoke(): Response
    {
        $email = new InternalNotification();

        $this->notifier->send(
            $email,
            new Recipient('test@example.com')
        );

        return new Response();
    }
}
