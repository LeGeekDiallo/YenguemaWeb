<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacebookController extends AbstractController
{
    #[Route('/facebook', name: 'facebook')]
    public function index(): Response
    {
        return $this->render('facebook/index.html.twig', [
            'controller_name' => 'FacebookController',
        ]);
    }

    #[Route('/facebook/connect', name: 'connect_facebook_start')]
    public function connectAction(ClientRegistry $clientRegistry): RedirectResponse
    {

        return $clientRegistry->getClient('facebook_main')
            ->redirect(['public_profile', 'email'], []);
    }

    #[Route('/facebook/connect/check', name: 'connect_facebook_check')]
    public function connectCheckAction(Request $request, ClientRegistry $clientRegistry){}
}
