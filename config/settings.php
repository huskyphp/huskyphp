<?php
$settings=[
    'displayErrorDetails' => true,

    //Eloquent / DB configuration
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