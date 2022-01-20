<?php
namespace AmirAnbari\Rabbitmq;

use Illuminate\Support\ServiceProvider;

class RabbitMQServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config'     => base_path('config'),
            __DIR__.'/migrations' => base_path('database/migrations'),
            __DIR__.'/php-config' => base_path('/'),
        ]);
    }
}
