<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Entity\JobOfferSearch;
use App\Entity\User;
use App\Form\JobOfferFormType;
use App\Form\JobOfferSearchFormType;
use App\Repository\JobOfferRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * JobController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/job", name="jobs_universe")
     */
    public function index(JobOfferRepository $repository): Response
    {
        $search = new JobOfferSearch();
        $form = $this->createForm(JobOfferSearchFormType::class, $search);
        return $this->render('job/index.html.twig', [
            'form_search' => $form->createView(),
            'recent_job'=>$repository->findRecentJob()
        ]);
    }

    /**
     * @param FileUploader $fileUploader
     * @param Request $request
     * @param User $user
     * @param NotifierInterface $notifier
     * @return Response
     * @Route("/job/new_job_offer_ad/{slug}-{id}", name="new_job_offer", requirements={"id"="\d+", "slug"="[a-zA-z0-9\-]*"})
     */
    public function new_job_offer_ad(FileUploader $fileUploader, Request $request, User $user, NotifierInterface $notifier):Response{
        $jobOffer = new JobOffer();
        $form = $this->createForm(JobOfferFormType::class, $jobOffer);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $jobOffer->setUser($user);
            $jobOffer->setCreatedAt(new \DateTime('now'));
            if($logo = $form['filename']->getData()){
                $logoFilename = $fileUploader->uploadCompanyLogo($logo);
                $jobOffer->setFilename($logoFilename);
            }
            $this->entityManager->persist($jobOffer);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre annonce a bien été ajoutée !", ['browser']));

            return $this->redirectToRoute('profile');
        }

        return $this->render('/job/new_job_offer_ad.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @param FileUploader $fileUploader
     * @param Request $request
     * @param JobOffer $jobOffer
     * @param NotifierInterface $notifier
     * @return Response
     * @Route("/job/edit_job_offer/{id}-{slug}", name="edit_job_offer", requirements={"id"="\d+", "slug"="[a-zA-z0-9\-]*"})
     */
    public function edit_job_offer(FileUploader $fileUploader, Request $request, JobOffer $jobOffer, NotifierInterface $notifier):Response{
        $form = $this->createForm(JobOfferFormType::class, $jobOffer);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $jobOffer->setCreatedAt(new \DateTime('now'));
            if($logo = $form['filename']->getData()){
                $fileUploader->delete($jobOffer->getFilename());
                $logoFilename = $fileUploader->upload($logo);
                $jobOffer->setFilename($logoFilename);
            }
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre annonce a bien été modifiée !", ['browser']));

            return $this->redirectToRoute('profile');
        }
        return $this->render('/job/edit_job_offer_ad.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @param JobOffer $jobOffer
     * @param Request $request
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @return Response
     * @Route("/job/delete_job_offer/{id}", name="delete_job_offer")
     */
    public function delete_job_offer(JobOffer $jobOffer, Request $request, FileUploader $fileUploader, NotifierInterface $notifier):Response{
        if($this->isCsrfTokenValid('delete'.$jobOffer->getId(), $request->get('_token'))){
            $fileUploader->delete($jobOffer->getFilename());
            $this->entityManager->remove($jobOffer);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre offre a bien été supprimée !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->redirectToRoute('profile');
    }

    /**
     * @param string $column
     * @param string $filter
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param JobOfferRepository $repository
     * @return Response
     * @Route("/job/job_offer_matches/{column}={filter}", name="job_offer_matches")
     */
    public function job_matches(string $column, string $filter, PaginatorInterface $paginator, Request $request, JobOfferRepository $repository):Response{
        $search = new JobOfferSearch();
        $form = $this->createForm(JobOfferSearchFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findByQuery($column, $filter),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render("/job/job_offer_matches.html.twig", [
            'pagination'=> $pagination,
            'form_search'=>$form->createView(),
            'address'=>$repository->findAddress()
        ]);
        $response->headers->set(AbstractSessionListener::NO_AUTO_CACHE_CONTROL_HEADER, true);
        $response->setCache([
            'max_age'=>3600,
            's_maxage'=>3600,
            'immutable'=>true,
            'last_modified'=>new \DateTime(),
        ]);
        return $response;
    }

    /**
     * @Route("job/job_offer_search", name="job_offer_search")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param JobOfferRepository $repository
     * @return Response
     */
    public function job_offer_search(PaginatorInterface $paginator, Request $request, JobOfferRepository $repository):Response{
        $search = new JobOfferSearch();
        $form = $this->createForm(JobOfferSearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('job/job_offer_matches.html.twig', [
                'pagination'=> $pagination,
                'form_search'=>$form->createView(),
                'address'=>$repository->findAddress()
            ]);
        }
    }

    /**
     * @param JobOffer $jobOffer
     * @return Response
     * @Route("job/job_offer_details/{id}-details-{slug}", name="job_offer_details")
     */
    public function job_offer_details(JobOffer $jobOffer):Response{
        return $this->render('job/job_offer_details.html.twig', [
            'joboffer'=>$jobOffer
        ]);
    }

    #[Route('/job/job_application/{id}-candidatures', name: 'all_application')]
    public function allApplications(JobOffer $jobOffer):Response{
        return $this->render('job/job_applications.html.twig', [
            'applications'=>$jobOffer->getJobApplies()
        ]);
    }
}
