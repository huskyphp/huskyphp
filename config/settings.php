<?php
$settings=[
    /*
    | DEBUGGING OPTIONS
    |--------------------------------------------------------------------------
    */
    'displayErrorDetails' => atm('APP_DEBUG'),
    'addContentLengthHeader' => false,

    /*
    | DATABASE CONFIGURATIONS
    |--------------------------------------------------------------------------
    */
    'db' => [

        'driver'    => 'mysql',
        'host'      => atm('DB_HOST'),
        'database'  => atm('DB_NAME'),
        'username'  => atm('DB_USER'),
        'password'  => atm('DB_PASS'),
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix'    => '',
    ]
];