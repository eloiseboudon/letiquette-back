<?php

namespace Tests\UserBundle\Controller;

use Tests\UserBundle\ApiTestCaseBase;

class LoginControllerTest extends ApiTestCaseBase
{
    public function testPOSTLoginUser()
    {
        $userName = "aUsername";
        $password = "uSuRn@m3";

        $client = static::createClient();
        $user = $this->createUser($userName, $password);

        $client->request(
            'POST',
            '/users/login',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json',
                'PHP_AUTH_USER' => $userName,
                'PHP_AUTH_PW'   => $password,
            ]
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $responseArr = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('token', $responseArr);
    }
    
    public function testPOSTLoginUserWithWrongUsername()
    {
        $userName = "aUsername";
        $password = "uSuRn@m3";

        $client = static::createClient();
        $user = $this->createUser($userName, $password);

        $client->request(
            'POST',
            '/users/login',
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json',
                'PHP_AUTH_USER' => $userName.'wrong_username',
                'PHP_AUTH_PW'   => $password,
            ]
        );
        
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $responseArr = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('Not Found', $responseArr['error']['message']);
    }
}