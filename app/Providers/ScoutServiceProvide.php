<?php

namespace App\Providers;

use MeiliSearch\Client;
use Illuminate\Support\ServiceProvider;

class ScoutServiceProvide extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $client = app(Client::class); $client->index('products')->updateFilterableAttributes(['category_ids', 'ngjyra']);
    }
}
