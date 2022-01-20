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

        $this->app->register(EventServiceProvider::class);
    }

    public function boot()
    {

    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);

        $this->app['config']->set($key,
            array_merge(require $path, $config)
        );
    }
}
