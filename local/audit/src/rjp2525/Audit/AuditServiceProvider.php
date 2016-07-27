<?php

namespace rjp2525\Audit;

use Illuminate\Support\ServiceProvider;

class AuditServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration file
    }

    /**
     * Boot service provider
     */
    public function boot()
    {
        // Publish configuration file and migrations
        $this->publishes([
            __DIR__ . '../migrations/create_request_log_table.php' => database_path('migrations/' . date('Y_m_d_His') . '_create_request_log_entries_table.php')
        ], 'migrations');
    }
}
