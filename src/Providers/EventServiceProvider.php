<?php


namespace AmirAnbari\Rabbitmq\Providers;

use AmirAnbari\Rabbitmq\Listeners\JobFailedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Queue\Events\JobFailed;


class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        JobFailed::class => [
            JobFailedListener::class
        ]
    ];

    public function boot()
    {
        parent::boot();
    }
}