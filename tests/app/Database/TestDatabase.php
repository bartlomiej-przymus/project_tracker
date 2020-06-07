<?php namespace App\Database;

use CodeIgniter\Test\CIDatabaseTestCase;

class TestDatabase extends \CodeIgniter\Test\CIDatabaseTestCase
{
    protected $refresh  = true;

    protected $seed     = 'TestPTSeed';

    protected $basePath = 'tests/app/Database';

    public function setUp()
    {
        //do something..
    }

    public function tearDown()
    {
        //do something..
    }
}
