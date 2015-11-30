<?php

use Falcon\Modules\Testing\TestingTrait;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as LTestCase;

class TestCase extends LTestCase
{
    use DatabaseMigrations, TestingTrait;

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
    public function setUp()
    {
        parent::setUp();

        if (!File::exists(storage_path('testing.sqlite'))) {
            touch(storage_path('testing.sqlite'));
            Artisan::call('migrate');
        } else {
            File::delete(storage_path('testing.sqlite'));
            touch(storage_path('testing.sqlite'));
            Artisan::call('migrate');
        }
    }

    /*
     * Reset for each test
     */
    /*public function tearDown()
{
Artisan::call('migrate:reset');
parent::tearDown();
}*/
}
