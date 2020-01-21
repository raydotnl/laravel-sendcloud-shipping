<?php

namespace DenizTezcan\SendCloud;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class SendCloudServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/shipping-sendcloud.php' => config_path('shipping-sendcloud.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('shipping-sendcloud', function () {
            return new SendCloud();
        });
    }

    public function provides()
    {
        return ['shipping-sendcloud'];
    }
}
