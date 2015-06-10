<?php

use Falcon\Modules\Testing\TestingTrait;
use Illuminate\Foundation\Testing\TestCase as LTestCase;

class TestCase extends LTestCase
{
    use TestingTrait;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        //putenv('DB_CONNECTION=sqlite_testing');

        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Default preparation for each test
     */
    /*public function setUp()
    {
    parent::setUp();
    Artisan::call('migrate');
    }*/

    /*
     * Reset for each test
     */
    /*public function tearDown()
{
Artisan::call('migrate:reset');
parent::tearDown();
}*/
}
