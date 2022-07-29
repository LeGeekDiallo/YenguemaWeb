<?php


namespace App\Notification;


use App\Entity\JobApply;
use App\Entity\JobOffer;
use App\Entity\User;
use Symfony\Component\Mime\Address;
use Symfony\Component\Notifier\Message\EmailMessage;
use Symfony\Component\Notifier\Notification\EmailNotificationInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\EmailRecipientInterface;

class Application extends Notification implements EmailNotificationInterface
{
    private User $user;
    private JobOffer $apply;

    /**
     * Application constructor.
     * @param \App\Entity\User $user
     * @param \App\Entity\JobOffer $apply
     */
    public function __construct(User $user, JobOffer $apply)
    {
        $this->user = $user;
        $this->apply = $apply;
        parent::__construct("Nouvelle candidature");
    }

    public function asEmailMessage(EmailRecipientInterface $recipient, string $transport = null): ?EmailMessage
    {
        $message = EmailMessage::fromNotification($this, $recipient);
        $message->getMessage()
            ->from(new Address('adminservice@leyenguema.com'))
            ->htmlTemplate('emails/new_application.html.twig')
            ->context(['user'=>$this->user, 'job_offer'=>$this->apply]);

        return $message;
    }
}