<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Test Create directive
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('d-m-y h:i'); ?>";
        });

        // Listening For Query Events
        // DB::listen(function (QueryExecuted $query) {
        //     // $query->sql;
        //     // $query->bindings;
        //     // $query->time;
        // });

        // Monitoring Cumulative Query Time
        DB::whenQueryingForLongerThan(500, function (Connection $connection, QueryExecuted $event) {
            // Notify development team...
        });
    }
}
