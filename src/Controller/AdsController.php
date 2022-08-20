<?php

namespace App\Controller;

use App\Entity\Ads;
use App\Entity\AdSearch;
use App\Entity\User;
use App\Form\AdSearchType;
use App\Form\AdsType;
use App\Notification\NewAdsNotification;
use App\Repository\AdsRepository;
use App\Tools\DeleteFile;
use App\Tools\UploadFile;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdsController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * AdsController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }



    #[Route("/ads", name:"ads_universe")]
    public function index(AdsRepository $repository): Response
    {
        $ad_search = new AdSearch();
        $form = $this->createForm(AdSearchType::class, $ad_search);
        return $this->render('ads/index.html.twig', [
            'last_ads' => $repository->findLastFourAds(),
            'form_search'=>$form->createView()
        ]);
    }

    /**
     * @Route("/ads/new_ad/{slug}-{id}", name="new_ad", requirements={"id"="\d+", "slug"="[a-zA-z0-9\-]*"})
     * @param Request $request
     * @param User $user
     * @param string $adsImageDir
     * @param NotifierInterface $notifier
     * @return Response
     */
    public function create_new_ads(Request $request, User $user, string $adsImageDir, NotifierInterface $notifier):Response{
        $ad = new Ads();
        $form = $this->createForm(AdsType::class, $ad);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $ad->setCreatedAt(new \DateTime('now'));
            $ad->setUser($user);
            $uploadFile = new UploadFile();
            $uploadFile->loadFiles($form, $adsImageDir, $ad);
            $this->entityManager->persist($ad);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre annonce a bien été ajoutée !", ['browser']));
            //$notifier->send(new NewAdsNotification($user), ...$notifier->getAdminRecipients());
            return $this->redirectToRoute('profile');
        }
        return $this->render('ads/new_ad.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/ads/ads_matches/{column}={category}", name="ads_matches")
     * @param string $column
     * @param string $category
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param AdsRepository $repository
     * @return Response
     */
    public function ads_matches(string $column, string $category, PaginatorInterface $paginator, Request $request, AdsRepository $repository):Response{
        $ad_search = new AdSearch();
        $form = $this->createForm(AdSearchType::class, $ad_search);
        $pagination = $paginator->paginate(
            $repository->findByQuery($column, $category),
            $request->query->getInt('page', 1),
            15
        );
        $response = $this->render("ads/ads_matches.html.twig", [
            'pagination'=>$pagination,
            'form_search'=>$form->createView(),
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
     * @Route("ads/ads_search", name="ads_search")
     * @param Request $request
     * @param AdsRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function ads_search(Request $request, AdsRepository $repository, PaginatorInterface $paginator):Response{
        $ad_search = new AdSearch();
        $form = $this->createForm(AdSearchType::class, $ad_search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($ad_search),
                $request->query->getInt('page', 1),
                15
            );
            return $this->render("ads/ads_matches.html.twig", [
                'form_search'=>$form->createView(),
                'pagination'=>$pagination
            ]);
        }
    }

    /**
     * @Route("ads/ad_details/{id}-{slug}", name="ad_details", requirements={"slug"="[a-zA-z0-9\-]*"})
     * @param Ads $ad
     * @return Response
     */
    public function ad_details(Ads $ad):Response{
        return $this->render('ads/ad_details.html.twig', [
            'ad'=>$ad
        ]);
    }

    /**
     * @Route("ads/ad_delete/{id}", name="ad_delete", requirements={"id"="\d+"})
     * @param Ads $ad
     * @param Request $request
     * @param NotifierInterface $notifier
     * @param string $adsImageDir
     * @return Response
     */
    public function ad_delete(Ads $ad, Request $request, NotifierInterface $notifier, string $adsImageDir):Response{
        $oldImageName = array();
        foreach ($ad->getAdPhotos() as $adPhoto){
            array_push($oldImageName, $adPhoto->getImageName());
        }
        if($this->isCsrfTokenValid('delete'.$ad->getId(), $request->get('_token'))){

            $this->entityManager->remove($ad);
            $this->entityManager->flush();
            $this->delete_files($oldImageName, $adsImageDir);
            $notifier->send(new Notification("Votre annonce a bien été supprimée !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->redirectToRoute('profile');
    }

    /**
     * deleting files from image dir
     * @param array $files
     * @param string $adsImageDir
     */
    private function delete_files(array $files, string $adsImageDir){
        foreach ($files as $filename){
            $deleteOldImageFile = new DeleteFile($filename, $adsImageDir);
            $deleteOldImageFile->deleteFile();
        }
    }
}
