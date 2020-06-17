<?php namespace App\Database;

use CodeIgniter\Test\CIDatabaseTestCase;

class DatabaseTest extends CIDatabaseTestCase
{
    protected $refresh  = true;

    protected $seed     = 'TestPTSeed';

    protected $basePath = 'tests/app/Database';

    public function setUp(): void
    {
        //
    }

    /**
     * Test to check if database exists and connection is ok to do
     */
    public function testDatabase()
    {
        $this->fail();
    }

    public function tearDown(): void
    {
        //
    }
}
