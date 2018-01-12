<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 11/01/2018
 * Time: 14:30
 */

namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;

class AuthTokenMembreProvider implements UserProviderInterface
{
    private $authTokenRepository;
    private $membreRepository;

    public function __construct(EntityRepository $authTokenRepository, EntityRepository $membreRepository)
    {
        $this->authTokenRepository = $authTokenRepository;
        $this->membreRepository = $membreRepository;
    }

    public function getAuthToken($authTokenHeader)
    {
        return $this->authTokenRepository->findOneBy(['value' => $authTokenHeader]);
    }

    public function loadUserByUsername($email)
    {
        return $this->membreRepository->findBy(['email' => $email]);
    }

    public function refreshUser(UserInterface $user)
    {
        // ATTENTION : Le systéme d'authentification est stateless, on ne doit donc jamais appeler la méthode refreshUser
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return 'AppBundle\Entity\Membres' === $class;
    }

}