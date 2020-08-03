<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Configuration Timezone Indonesia
        config(['app.locale' => 'id']);
        config(['app.faker_locale' => 'id_ID']);
        date_default_timezone_set('Asia/Jakarta');
    }
}
