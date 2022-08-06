<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\ActivityImage;
use App\Entity\ActivitySearch;
use App\Entity\User;
use App\Form\ActivityFormType;
use App\Form\ActivitySearchFormType;
use App\Notification\NewActivityNotification;
use App\Repository\ActivityRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ActivityController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * ActivityController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/activity", name="trades_universe")
     * @return Response
     */
    public function index(): Response
    {
        $search = new ActivitySearch();
        $form = $this->createForm(ActivitySearchFormType::class, $search);
        return $this->render('activity/index.html.twig', [
            'controller_name' => 'ActivityController',
            'form_search'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/activity/edit_activity/{slug}-{id}", name="edit_activity", requirements={"id"="\d+", "slug"="[a-zA-z0-9\-]*"})
     * @param Request $request
     * @param Activity $activity
     * @param NotifierInterface $notifier
     * @param FileUploader $fileUploader
     * @return Response
     * @IsGranted("ROLE_USER")
     */
    public function editActivity(Request $request, Activity $activity, NotifierInterface $notifier, FileUploader $fileUploader):Response{
        $form = $this->createForm(ActivityFormType::class, $activity);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($images = $form['activityImages']->getData()){
                $fileUploader->activityImagesUpload($images, $activity);
            }
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre activité a bien été editée !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('activity/edit_activity.html.twig', [
            'form'=>$form->createView(),
            'activity'=>$activity
        ]);
    }

    /**
     * @Route("/activity/new_activity/{id}-new_activity", name="new_activity")
     * @param Request $request
     * @param User $user
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @return Response
     */
    public function newActivity(Request $request, User $user, FileUploader $fileUploader, NotifierInterface $notifier):Response{
        $activity = new Activity();
        $form = $this->createForm(ActivityFormType::class, $activity);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $activity->setCreatedAt(new \DateTime('now'));
            $activity->setUser($user);
            if($images = $form['activityImages']->getData()){
                $fileUploader->activityImagesUpload($images, $activity);
            }
            $this->entityManager->persist($activity);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre activité a bien été ajoutée !", ['browser']));
            //$notifier->send(new NewActivityNotification($user), ...$notifier->getAdminRecipients());
            return $this->redirectToRoute('profile');
        }
        return $this->render('activity/create_new_activity.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/activity/delete_activity/{id}", name="delete_activity", methods={"DELETE"})
     * @param Activity $activity
     * @param Request $request
     * @param NotifierInterface $notifier
     * @param FileUploader $fileUploader
     * @return Response
     */
    public function deleteActivity(Activity $activity, Request $request, NotifierInterface $notifier, FileUploader $fileUploader):Response{
        if($this->isCsrfTokenValid('delete'.$activity->getId(), $request->get('_token'))){
            foreach ($activity->getActivityImages() as $actImages){
                $fileUploader->deleteActivityImage($actImages->getFilename());
            }
            $this->entityManager->remove($activity);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre activité a bien été supprimée !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->redirectToRoute('profile');
    }

    /**
     * @Route("/activity/activities_matches/{column}={category}", name="activities_matches")
     * @param string $column
     * @param string $category
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param ActivityRepository $repository
     * @return Response
     */
    public function activities_matches(string $column, string $category, PaginatorInterface $paginator, Request $request, ActivityRepository $repository):Response{
        $search = new ActivitySearch();
        $form = $this->createForm(ActivitySearchFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findByQuery($column, $category),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render('activity/activities_matches.html.twig', [
            'pagination'=> $pagination,
            'form_search'=>$form->createView()
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
     * @Route("/activity/activities_search", name="activities_search")
     * @param Request $request
     * @param ActivityRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function activity_search(Request $request, ActivityRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ActivitySearch();
        $form = $this->createForm(ActivitySearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('activity/activities_matches.html.twig', [
                'pagination'=> $pagination,
                'form_search'=>$form->createView()
            ]);
        }
        return $this->render('activity/activities_matches.html.twig', [
            'pagination'=> false,
            'form_search'=>$form->createView()
        ]);
    }

    /**
     * @Route("/activity/activities_matches/{id}-{rate_type}", name="activity_rate", requirements={"id"="\d*", "rate_type"="[a-z]*"})
     * @param Activity $activity
     * @param Request $request
     * @param string $rate_type
     * @return Response
     */
    public function activity_rate(Activity $activity, Request $request, string $rate_type):Response{
        if($activity->getLikes() === null){
            $activity->setLikes(0);
        }
        if($activity->getUnlikes() === null){
            $activity->setUnlikes(0);
        }
        if($rate_type === "like"){
            $activity->setLikes($activity->getLikes()+$request->get("value"));
        }
        else{
            $activity->setUnlikes($activity->getUnlikes()+$request->get("value"));
        }
        $this->entityManager->flush();
        return $this->json(["status"=>"Ok", "likes"=>$activity->getLikes(), "unlikes"=>$activity->getUnlikes()]);
    }

    /**
     * @param Activity $activity
     * @param ActivityImage $image
     * @param FileUploader $fileUploader
     * @return Response
     */
    #[Route("/activity/remove_image/{activity}-{image}", name: "remove_image")]
    public function deleteImage(Activity $activity, ActivityImage $image, FileUploader $fileUploader):Response{
        $fileUploader->deleteActivityImage($image->getFilename());
        $activity->removeActivityImage($image);
        $this->entityManager->flush();

        return $this->json(["status"=>"Ok", "nb_images"=>count($activity->getActivityImages())]);
    }

    /**
     * @param Activity $activity
     * @param string $slug
     * @return Response
     */
    #[Route("/activity/details/{id}-{slug}", name: "act_details")]
    public function actDetails(Activity $activity, string $slug):Response{
        if($this->isCsrfTokenValid('slug'.$activity->getSlug(), $slug)){
            return $this->render('/activity/act_details.html.twig', [
                'activity'=>$activity
            ]);
        }
        return $this->render('/activity/act_details.html.twig', [
            'id'=>$activity->getId(),
            'slug'=>$activity->getSlug()
        ]);
    }
}
