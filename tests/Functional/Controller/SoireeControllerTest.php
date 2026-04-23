<?php

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SoireeControllerTest extends WebTestCase
{
public function testPageSoirees(): void
{
    $client = static::createClient();
    $client->request('GET', '/soiree');
    self::assertResponseRedirects('/login');
}
}