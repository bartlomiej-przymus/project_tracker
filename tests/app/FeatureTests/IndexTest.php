<?php namespace App\FeatureTests;

use CodeIgniter\Test\FeatureTestCase;

class TestIndex extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
       parent::tearDown();
    }

    public function testIfIndexDisplaysLoginPage()
    {
        $result = $this->get('/');

        $result->assertContains('Please sign in');
    }


}
