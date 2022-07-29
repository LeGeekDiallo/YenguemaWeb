<?php


namespace App\Security;


use App\Entity\User;
use App\Repository\UserRepository;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\OAuth2ClientInterface;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use League\OAuth2\Client\Provider\FacebookUser;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class FaceBookAuthenticator extends SocialAuthenticator
{
    public function __construct(
        private ClientRegistry $clientRegistry,
        private UserRepository $userRepository,
        private RouterInterface $router,
        private UserPasswordEncoderInterface $encoder
    ){}

    /**
     * @inheritDoc
     */
    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'connect_facebook_check';
    }


    /**
     * @inheritDoc
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey): ?Response
    {
        return new RedirectResponse($this->router->generate('profile'));
    }

    /**
     * @inheritDoc
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $message = strtr($exception->getMessageKey(), $exception->getMessageData());
        return new Response($message, Response::HTTP_FORBIDDEN);
    }

    /**
     * @inheritDoc
     */
    public function start(Request $request, AuthenticationException $authException = null): string|Response
    {
        return $this->router->generate('login_user');
    }

    /**
     * @inheritDoc
     */
    public function getCredentials(Request $request)
    {
        return $this->fetchAccessToken($this->getFacebookClient());
    }

    /**
     * @inheritDoc
     */
    public function getUser($credentials, UserProviderInterface $userProvider):User
    {

        /**
         * @var FacebookUser $facebookUser
         */
        $facebookUser = $this->getFacebookClient()->fetchUserFromToken($credentials);
        $email = $facebookUser->getEmail();

        $existingUser = $this->userRepository->findOneBy(['facebook_id'=>$facebookUser->getId()]);

        if($existingUser){
            return $existingUser;
        }
        $user = $this->userRepository->findOneBy(['email'=>$email]);
        if($user)
            return $user;

        return $this->userRepository->findOrCreateFromFacebookOauth($facebookUser, $this->encoder);
    }

    /**
     * @return OAuth2ClientInterface
     */
    private function getFacebookClient(): OAuth2ClientInterface
    {
        return $this->clientRegistry->getClient('facebook_main');
    }
}