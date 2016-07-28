<?php

namespace Falcon\Console\Commands;

use Illuminate\Console\Command;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an internal application module';

    /**
     * Instance of class to manipulate filesystem
     *
     * @var
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Check if module already exists
    }
}
