<?php

namespace App\Controller;

use App\Entity\JobApply;
use App\Entity\JobOffer;
use App\Entity\User;
use App\Form\ApplyFormType;
use App\Notification\Application;
use App\Service\Email;
use App\Service\PDFFileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager){}

    /**
     * @param Request $request
     * @param JobOffer $job
     * @param User $user
     * @param PDFFileUploader $fileUploader
     * @param MailerInterface $mailer
     * @param NotifierInterface $notifier
     * @return Response
     */
    #[Route('/application/{job}-candidature-{user}', name: 'new_application')]
    public function newApplication(Request $request, JobOffer $job, User $user, PDFFileUploader $fileUploader, MailerInterface $mailer, NotifierInterface $notifier): Response
    {
        $apply = new JobApply();
        $form = $this->createForm(ApplyFormType::class, $apply);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $apply->addUser($user)
                ->setCandidateName($user->getUsername())
                ->setCandidateEmail($user->getEmail())
                ->setCandidatePhonenumber($user->getPhoneNumber())
                ->setJob($job)
                ->setCreatedAt(new \DateTime('now'));

            if($pdf=$form['filename']->getData()){
                $filename = $fileUploader->upload($pdf);
                $apply->setFilename($filename);

                //$this->sendEmailApplication($filename, $job, $user, $mailer, $apply);
                $notifier->send(new Notification("Votre candidature a bien été envoyée !", ['browser']));
            }
            $this->entityManager->persist($apply);
            $this->entityManager->flush();
            return $this->redirectToRoute('job_offer_details', [
                'id'=>$job->getId(),
                'slug'=>$job->getSlug()
            ]);
        }
        return $this->render('application/new_application.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param string $filename
     * @param JobOffer $jobOffer
     * @param User $user
     * @param MailerInterface $mailer
     * @param JobApply $apply
     */
    private function sendEmailApplication(string $filename, JobOffer $jobOffer, User $user, MailerInterface $mailer, JobApply $apply):void{
        $email = (new TemplatedEmail())
            ->from(new Address('adminservice@leyenguema.com'))
            ->to(new Address($user->getEmail()))
            ->subject("Nouvelle candidature")
            ->htmlTemplate('emails/new_application.html.twig')
            ->attachFromPath('../public/resume/'.$filename, 'CV Candidat(e)')
            ->context([
                'user'=>$user,
                'job_offer'=>$jobOffer,
                'importance'=>'',
                'action_url'=>false,
                'action_text'=>'',
                'exception'=>false,
                'letter'=> $apply->getApplicationLetter()
            ]);
        try {
            $mailer->send($email);
        }catch (TransportExceptionInterface $exception){

        }
    }
}
