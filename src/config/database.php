<?php


return [
    'driver' => 'database',
    'table' => 'jobs',
    'queue' => 'FanoutQueue',
    'retry_after' => 90,
    'after_commit' => false,
];