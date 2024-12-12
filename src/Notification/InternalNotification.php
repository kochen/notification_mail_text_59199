<?php

declare(strict_types=1);

namespace App\Notification;

use Override;
use Symfony\Bridge\Twig\Mime\NotificationEmail;
use Symfony\Component\Notifier\Message\EmailMessage;
use Symfony\Component\Notifier\Notification\EmailNotificationInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\EmailRecipientInterface;

final class InternalNotification extends Notification implements EmailNotificationInterface
{
    #[Override]
    public function asEmailMessage(EmailRecipientInterface $recipient, string|null $transport = null): EmailMessage|null
    {
        $email = NotificationEmail::asPublicEmail()
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Time for Symfony Mailer!')
            ->htmlTemplate('email.html.twig')
        ;

        return new EmailMessage($email);
    }
}
