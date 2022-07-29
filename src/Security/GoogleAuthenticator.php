<?php


namespace App\Security;


use App\Entity\User;
use App\Repository\UserRepository;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\OAuth2ClientInterface;
use KnpU\OAuth2ClientBundle\Client\Provider\GoogleClient;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class GoogleAuthenticator extends SocialAuthenticator
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
    public function start(Request $request, AuthenticationException $authException = null)
    {
        return $this->router->generate('login_user');
    }

    /**
     * @inheritDoc
     */
    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'connect_google_check';
    }

    /**
     * @inheritDoc
     */
    public function getCredentials(Request $request)
    {
        return $this->fetchAccessToken($this->getGoogleClient());
    }

    /**
     * @inheritDoc
     */
    public function getUser($credentials, UserProviderInterface $userProvider): User|null
    {
        /**
         * @var GoogleUser $googleUser
         */
        $googleUser = $this->getGoogleClient()->fetchUserFromToken($credentials);

        $existingUser = $this->userRepository->findOneBy(['google_id'=>$googleUser->getId()]);
        $email = $googleUser->getEmail();
        if (!$googleUser->toArray()['email_verified']){
            throw new CustomUserMessageAuthenticationException("Votre compte Google n'est pas validé.");
        }
        if($existingUser){
            return $existingUser;
        }
        $user = $this->userRepository->findOneBy(['email'=>$email]);
        if($user)
            return $user;

        return $this->userRepository->findOrCreateGoogleOauth($googleUser, $this->encoder);
    }

    /**
     * @inheritDoc
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception):?Response
    {
        // TODO: Implement onAuthenticationFailure() method.
        $message = strtr($exception->getMessageKey(), $exception->getMessageData());

        return new Response($message, Response::HTTP_FORBIDDEN);
    }

    /**
     * @inheritDoc
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey): ?Response
    {
        return new RedirectResponse($this->router->generate('profile'));
    }
    /**
     * @return OAuth2ClientInterface
     */
    private function getGoogleClient(): OAuth2ClientInterface
    {
        return $this->clientRegistry->getClient('google_main');
    }
}