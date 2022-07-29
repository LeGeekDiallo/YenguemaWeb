<?php

namespace App\Controller;


use App\Repository\ApartmentRepository;
use App\Repository\HouseVillaRepository;
use App\Repository\OfficeShopLandRepository;
use App\Repository\StudioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Symfony\Component\Routing\Annotation\Route;

class RealEstateController extends AbstractController
{

    #[Route('/real/estate', name: 'real_estate')]
    public function index(ApartmentRepository $repository, HouseVillaRepository $villaRepository, StudioRepository $studioRepository, OfficeShopLandRepository $shopLandRepository): Response
    {
        $response = $this->render('real_estate/index.html.twig', [
            'aparts' => $repository->findBy(['proposition_type'=>'A louer'], ['created_at'=>'DESC'], 3),
            'sale_aparts' => $repository->findBy(['proposition_type'=>'A vendre'], ['created_at'=>'DESC'], 3),
            'houses'=> $villaRepository->findBy(['proposition_type'=>'A louer'], ['created_at'=>'DESC'], 3),
            'sale_houses' => $villaRepository->findBy(['proposition_type'=>'A vendre'], ['created_at'=>'DESC'], 3),
            'studios'=>$studioRepository->findBy([], ['created_at'=>'DESC'], 3),
            'ols_s'=>$shopLandRepository->findBy(['proposition_type'=>'A louer'], ['created_at'=>'DESC'], 3),
            'sale_ols'=>$shopLandRepository->findBy(['proposition_type'=>'A vendre', 'property_type'=>'Terrain'], ['created_at'=>'DESC'], 3)
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

    #[Route('/real/estate/new_property', name: 'new_property')]
    public function newProperty():Response{
        return $this->render('real_estate/new_property.html.twig');
    }

    #[Route('/real/estate/properties', name: 'user_properties')]
    public function userProperties():Response{
        return $this->render('/real_estate/user_properties.html.twig');
    }
}
