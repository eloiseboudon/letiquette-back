<?php
 
namespace Tests\UserBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
 
class RegistrationControllerTest extends WebTestCase
{
    public function testPostRegisterNewUser()
    {
        $data = [
            'username' => 'kakolio',
            'email' => 'kakolio@gmail.com',
            'plainPassword' => [
                'first' => 'azerty', 'second' => 'azerty'
            ]
        ];
        
        $client = $this->makePOSTRequest($data);
        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    public function testPostRegisterNewUserWithInvalidEmail() {
        $data = [
            'username' => 'BadEmail',
            'email' => 'nomail.her',
            'plainPassword' => [
                'first' => 'azerty', 'second' => 'azerty'
            ]
        ];

        $client = $this->makePOSTRequest($data);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    private function makePOSTRequest($data)
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/users/register',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode($data)
        );

        return $client;
    }
}