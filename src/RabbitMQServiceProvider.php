<?php
namespace AmirAnbari\Rabbitmq;

use Illuminate\Support\ServiceProvider;

class RabbitMQServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/rabbitmq.php',
            'queue.connections.rabbitmq'
        );

        $this->mergeConfigFrom(
            __DIR__.'/config/database.php',
            'queue.connections.database'
        );
    }

    public function boot()
    {

    }
}
