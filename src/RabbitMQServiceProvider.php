<?php
namespace AmirAnbari\Rabbitmq;

use AmirAnbari\Rabbitmq\Providers\EventServiceProvider;
use VladimirYuldashev\LaravelQueueRabbitMQ\LaravelQueueRabbitMQServiceProvider;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\ServiceProvider;

class RabbitMQServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->register(LaravelQueueRabbitMQServiceProvider::class);
    }

    public function boot()
    {
        app('events')->listen(JobFailed::class, function ($event) {
            $event->connectionName = 'database';
        });
    }
}
