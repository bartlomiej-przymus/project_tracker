<?php namespace App\Controllers;

use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;

class AuthTest extends CIDatabaseTestCase
{
    use ControllerTester;

    public function testIndex()
    {
        $result = $this->controller(\App\Controllers\Auth::class)
                        ->execute('index');

        $this->assertTrue($result->isOK());
    }
}
