<?php

namespace Falcon\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:clear {--seed : Seed the database after clearing}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all database tables and run the migrations.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tables = [];

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach (DB::select('SHOW TABLES') as $k => $v) {
            $tables[] = array_values((array) $v)[0];
        }

        foreach ($tables as $table) {
            Schema::drop($table);
            $this->info('Table ' . $table . ' has been dropped.');
        }

        $this->call('migrate');

        if ($this->option('seed')) {
            $this->call('db:seed');
        }
    }
}
