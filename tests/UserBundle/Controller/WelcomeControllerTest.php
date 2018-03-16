<?php
 
namespace Tests\AppBundle\Controller;
 
use Tests\UserBundle\ApiTestCaseBase;
 
class WelcomeControllerTest extends ApiTestCaseBase
{
    public function testGETWelcomeMessageForUser()
    {
        $token = $this->getTokenForTestUser();

        $client = static::createClient();

        $client->request(
            'GET',
            '/users/welcome',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json',
                'HTTP_AUTHORIZATION' => 'Bearer '.$token
            ],
            []
        );
 
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('Hello user.', json_decode($client->getResponse()->getContent(), true));
    }
 
    /**
     * Creates some user and returns his token
     *
     * @return string
     */
    private function getTokenForTestUser()
    {
        $userName = "aUsername";
        $password = "azerty";
 
        $user = $this->createUser($userName, $password);
 
        $client = static::createClient();

        $token = $client->getContainer()->get('lexik_jwt_authentication.encoder')
            ->encode(['username' => 'aUsername']);
 
        return $token;
    }

    public function testGETWelcomeMessageAsUnauthorizedUser()
    {
        $client = static::createClient();
        
        $client->request(
            'GET',
            '/users/welcome',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json'
            ],
            []
        );

        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }
}