<?php

namespace App\Controller;

use App\Repository\ActivityRepository;
use App\Repository\AdsRepository;
use App\Repository\ApartmentRepository;
use App\Repository\CarRepository;
use App\Repository\HouseVillaRepository;
use App\Repository\JobOfferRepository;
use App\Repository\OfficeShopLandRepository;
use App\Repository\ParkAutoRepository;
use App\Repository\RideRepository;
use App\Repository\StudioRepository;
use App\Repository\TaxiDriverRepository;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'sitemap', defaults: ['_format'=>'xml'])]
    public function index(Request                  $request, ApartmentRepository $repository, HouseVillaRepository $villaRepository,
                          StudioRepository         $studioRepository,
                          OfficeShopLandRepository $shopLandRepository,
                          ActivityRepository       $activityRepository,
                          AdsRepository            $adsRepository,
                          TeacherRepository        $teacherRepository,
                          JobOfferRepository       $offerRepository,
                          ParkAutoRepository       $autoRepository,
                          RideRepository           $rideRepository,
                          TaxiDriverRepository     $taxiDriverRepository): Response
    {
        $urls = [];
        $hostname = $request->getSchemeAndHttpHost();
        $urls[] = ['loc' => $this->generateUrl('trades_universe')];
        $urls[] = ['loc' => $this->generateUrl('ads_universe')];
        $urls[] = ['loc' => $this->generateUrl('education')];
        $urls[] = ['loc' => $this->generateUrl('jobs_universe')];
        $urls[] = ['loc' => $this->generateUrl('park_auto')];
        $urls[] = ['loc' => $this->generateUrl('travel')];
        $urls[] = ['loc' => $this->generateUrl('trips')];
        $urls[] = ['loc' => $this->generateUrl('taxi')];

        foreach ($activityRepository->findAll() as $activity){
            $images = [
                'loc'=> '/images/activity_image/'.$activity->getImageName(),
                'title'=> $activity->getActivityName()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('activities_matches', [
                    'column'=>'category',
                    'category'=>$activity->getCategory()
                ]),
                'lastmod' => $activity->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('activities_matches', [
                    'column'=>'city',
                    'category'=>$activity->getCity()
                ]),
                'lastmod' => $activity->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('activities_matches', [
                    'column'=>'municipality',
                    'category'=>$activity->getMunicipality()
                ]),
                'lastmod' => $activity->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];

        }
        foreach ($activityRepository->findAll() as $activity){
            $images = [
                'loc'=> '/images/activity_image/'.$activity->getImageName(),
                'title'=> $activity->getActivityName()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('activities_search', [
                    'category'=>$activity->getCategory(),
                    'address'=>$activity->getMunicipality()
                ]),
                'lastmod' => $activity->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('activities_search', [
                    'category'=>$activity->getCategory(),
                    'address'=>$activity->getCity()
                ]),
                'lastmod' => $activity->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('activities_search', [
                    'category'=>$activity->getCategory(),
                    'address'=>$activity->getAddress()
                ]),
                'lastmod' => $activity->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }

        foreach ($adsRepository->findAll() as $ads) {
            $images = [
                'loc' => '/images/ad_image/' . $ads->getAdPhotos()[0]->getImageName(),
                'title' => $ads->getAdTitle()
            ];
            $urls[] = [
                'loc' => $this->generateUrl('ads_matches', [
                    'column' => 'category',
                    'category' => $ads->getAdCategory()
                ]),
                'lastmod' => $ads->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc' => $this->generateUrl('ads_matches', [
                    'column' => 'city',
                    'category' => $ads->getCity()
                ]),
                'lastmod' => $ads->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc' => $this->generateUrl('ads_matches', [
                    'column' => 'municipality',
                    'category' => $ads->getMunicipality()
                ]),
                'lastmod' => $ads->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        foreach ($adsRepository->findAll() as $ads){
            $images = [
                'loc' => '/images/ad_image/' . $ads->getAdPhotos()[0]->getImageName(),
                'title' => $ads->getAdTitle()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('ads_search', [
                    'keyWord'=>$ads->getAdCategory(),
                    'address'=>$ads->getMunicipality()
                ]),
                'lastmod' => $ads->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('ads_search', [
                    'keyWord'=>$ads->getAdCategory(),
                    'address'=>$ads->getCity()
                ]),
                'lastmod' => $ads->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('ads_search', [
                    'keyWord'=>$ads->getAdCategory(),
                    'address'=>$ads->getAddress()
                ]),
                'lastmod' => $ads->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        foreach ($teacherRepository->findAll() as $teacher){
            $images = [
                'loc'=> '/images/users_avatar/'.$teacher->getUser()->getUserAvatar()->getImageName(),
                'title'=> $teacher->getTitle()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_teachers'),
                'lastmod' => $teacher->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        foreach ($offerRepository->findAll() as $offer){
            $images = [
                'loc'=> '/images/users_avatar/'.$offer->getFilename(),
                'title'=> $offer->getJobTitle()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('job_offer_matches', [
                    'column'=> 'contract_type',
                    'filter'=>$offer->getContractType()
                ]),
                'lastmod' => $offer->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('job_offer_matches', [
                    'column'=>'job_title',
                    'filter'=>$offer->getCategory()
                ]),
                'lastmod' => $offer->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        foreach ($offerRepository->findAll() as $offer){
            $images = [
                'loc'=> '/images/users_avatar/'.$offer->getFilename(),
                'title'=> $offer->getJobTitle()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('job_offer_search', [
                    'job_title'=> $offer->getJobTitle(),
                    'address'=>$offer->getCity()
                ]),
                'lastmod' => $offer->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('job_offer_search', [
                    'job_title'=> $offer->getJobTitle(),
                    'address'=>$offer->getMunicipality()
                ]),
                'lastmod' => $offer->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];

        }
        foreach ($autoRepository->findAll() as $park){
            $images = [
                'loc'=> '/companies_logo/'.$park->getFilename(),
                'title'=> $park->getParkName()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('park_auto'),
                'lastmod' => $park->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];

            $urls[] = [
                'loc'=> $this->generateUrl('park_auto', [
                    'parkName'=>$park->getParkName(),
                    'address'=>$park->getAddress()
                ]),
                'lastmod' => $park->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('park_auto_page', [
                    'id'=>$park->getId(),
                ]),
                'lastmod' => $park->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        foreach ($rideRepository->findAll() as $ride){
            $urls[] = [
                'loc'=> $this->generateUrl('trip_destination', [
                    'column'=>'destination',
                    'filter'=>$ride->getDestination()
                ]),
                'lastmod' => $ride->getCreatedAt()->format('Y-m-d'),
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('trips', [
                    'departure'=>$ride->getDeparture(),
                    'destination'=>$ride->getDestination(),
                    'date_depart'=>$ride->getDepartureDate()
                ]),
                'lastmod' => $ride->getCreatedAt()->format('Y-m-d'),
            ];
        }
        foreach ($taxiDriverRepository->findAll() as $taxiDriver){
            $urls[] = [
                'loc'=> $this->generateUrl('taxi', [
                    'location'=>$taxiDriver->getCity(),
                ]),
                'lastmod' => $taxiDriver->getCreatedAt()->format('Y-m-d'),
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('taxi', [
                    'location'=>$taxiDriver->getMunicipality(),
                ]),
                'lastmod' => $taxiDriver->getCreatedAt()->format('Y-m-d'),
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('taxi_driver_filter', [
                    'column'=>'city',
                    'filter'=>$taxiDriver->getCity(),
                ]),
                'lastmod' => $taxiDriver->getCreatedAt()->format('Y-m-d'),
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('taxi_driver_filter', [
                    'column'=>'municipality',
                    'filter'=>$taxiDriver->getMunicipality(),
                ]),
                'lastmod' => $taxiDriver->getCreatedAt()->format('Y-m-d'),
            ];
        }

        foreach ($repository->findAll() as $apartment){
            $images = [
                'loc'=> '/companies_logo/'.$apartment->getApartmentImages()[0]->getFilename(),
                'title'=> $apartment->getAdTitle()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments'),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getCity(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getMunicipality(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getDistrict(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        foreach ($villaRepository->findAll() as $apartment){
            $images = [
                'loc'=> '/companies_logo/'.$apartment->getHouseVillaImages()[0]->getFilename(),
                'title'=> $apartment->getAdTitle()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments'),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getCity(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getMunicipality(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getDistrict(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        foreach ($studioRepository->findAll() as $apartment){
            $images = [
                'loc'=> '/companies_logo/'.$apartment->getStudioImages()[0]->getFilename(),
                'title'=> $apartment->getAdTitle()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments'),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getCity(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getMunicipality(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getDistrict(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        foreach ($shopLandRepository->findAll() as $apartment){
            $images = [
                'loc'=> '/companies_logo/'.$apartment->getOfficeShopLandImages()[0]->getFilename(),
                'title'=> $apartment->getAdTitle()
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments'),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getCity(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getMunicipality(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
            $urls[] = [
                'loc'=> $this->generateUrl('all_apartments', [
                    'location'=> $apartment->getDistrict(),
                    'price'=>$apartment->getCity()
                ]),
                'lastmod' => $apartment->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }
        $response = new Response(
            $this->renderView('sitemap/index.html.twig', ['urls' => $urls,
                'hostname' => $hostname]),
            200
        );

        $response->headers->set('Content-Type', 'text/xml');
        return $response;
    }
}
