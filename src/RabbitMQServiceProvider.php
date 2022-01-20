<?php
namespace AmirAnbari\Rabbitmq;

use AmirAnbari\Rabbitmq\Providers\EventServiceProvider;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\ServiceProvider;

class RabbitMQServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/rabbitmq.php', 'queue.connections.rabbitmq');

        $this->mergeConfigFrom(__DIR__.'/config/database.php', 'queue.connections.database');

        app('events')->listen(JobFailed::class, function ($event) {
            $event->connectionName = 'database';
        });
    }

    public function boot()
    {

    }
}
