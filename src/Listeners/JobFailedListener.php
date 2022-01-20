<?php

namespace AmirAnbari\Rabbitmq\Listeners;


use Illuminate\Queue\Events\JobFailed;

class JobFailedListener
{
    public function handle(JobFailed $event)
    {
        $event->connectionName = 'database';
    }
}