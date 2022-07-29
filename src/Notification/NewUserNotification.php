<?php


namespace App\Notification;


use App\Entity\User;
use Symfony\Component\Mime\Address;
use Symfony\Component\Notifier\Message\EmailMessage;
use Symfony\Component\Notifier\Notification\EmailNotificationInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\EmailRecipientInterface;

class NewUserNotification extends Notification implements EmailNotificationInterface
{

    private User $user;

    /**
     * NewUserNotification constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        parent::__construct("New user subscribed");
    }

    public function asEmailMessage(EmailRecipientInterface $recipient, string $transport = null): ?EmailMessage
    {
        $message = EmailMessage::fromNotification($this, $recipient);
        $message->getMessage()
            ->from(new Address('adminservice@leyenguema.com'))
            ->htmlTemplate('emails/new_user_notification.html.twig')
            ->context(['user'=>$this->user]);

        return $message;
    }
}