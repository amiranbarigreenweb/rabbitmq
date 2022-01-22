##Lumen RabbitMQ

1) Enable sockets php extension


2) You can install this package via composer using this command:

```
composer require amiranbari/rabbitmq-package
```

### Necessary Config

- Add this into bootstrap/app.php

```php
$app->register(AmirAnbari\Rabbitmq\RabbitMQServiceProvider::class);
```

- Change/add these parameters into .env file
```php
QUEUE_CONNECTION=rabbitmq 

RABBITMQ_HOST=lumen-rabbitmq 
RABBITMQ_PORT=5672 
RABBITMQ_USER=lumen-rabbit
RABBITMQ_PASSWORD=lumen-rabbit
RABBITMQ_VHOST=/
RABBITMQ_QUEUE=FanoutQueue
```

- Add connection to `config/queue.php`:
```php
'connections' => [
    // ...

    'rabbitmq' => [
    
       'driver' => 'rabbitmq',
       'queue' => env('RABBITMQ_QUEUE', 'default'),
       'connection' => PhpAmqpLib\Connection\AMQPLazyConnection::class,
   
       'hosts' => [
           [
               'host' => env('RABBITMQ_HOST', '127.0.0.1'),
               'port' => env('RABBITMQ_PORT', 5672),
               'user' => env('RABBITMQ_USER', 'guest'),
               'password' => env('RABBITMQ_PASSWORD', 'guest'),
               'vhost' => env('RABBITMQ_VHOST', '/'),
           ],
       ],
   
       'options' => [
           'ssl_options' => [
               'cafile' => env('RABBITMQ_SSL_CAFILE', null),
               'local_cert' => env('RABBITMQ_SSL_LOCALCERT', null),
               'local_key' => env('RABBITMQ_SSL_LOCALKEY', null),
               'verify_peer' => env('RABBITMQ_SSL_VERIFY_PEER', true),
               'passphrase' => env('RABBITMQ_SSL_PASSPHRASE', null),
           ],
           'queue' => [
               'job' => VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob::class,
           ],
       ],
   
       /*
        * Set to "horizon" if you wish to use Laravel Horizon.
        */
       'worker' => env('RABBITMQ_WORKER', 'default'),
        
    ],

    // ...    
],
```

- Change database connection in `config/queue.php`:

```php
'driver' => 'database',
    'table' => 'jobs',
    'queue' => 'FanoutQueue',
    'retry_after' => 90,
    'after_commit' => false,
```

