<?php

namespace Tests\UserBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

class ApiTestCaseBase extends WebTestCase
{
    protected static $staticClient;

    public static function setUpBeforeClass()
    {
        self::$staticClient = static::createClient(['environment' => 'test']);
        // kernel boot, so we can get the container and use our services
        self::bootKernel();
    }
    
    protected function createUser($userName, $password, $addOnEmail = null)
    {
        $client = static::createClient();

        $userManager = $client->getContainer()->get('fos_user.user_manager');

        $user = $userManager->createUser();
        $user->setEnabled(true);
        $user->setPlainPassword($password);
        $user->setUsername($userName);
        $user->setEmail('email@email.com');
        $user->setEnabled(true);

        $userManager->updateUser($user);

        if (null !== $addOnEmail) {
            $user->addEmail($addOnEmail);
            $userManager->updateUser($user);
        }
        
        return $user;
    }
}