<?php
require(realpath(__DIR__ . '/../bootstrap/app.php'));
return [
    /*
    | MIGRATION FILE PATH
    |--------------------------------------------------------------------------
    */
    'paths' => [
        'migrations' => 'database/migrations'
    ],
    /*
    | MIGRATION BASE CLASS WHERE DB CONFIGURATIONS ARE DEFINED
    |--------------------------------------------------------------------------
    */
    'migration_base_class' => 'Database\Migration',
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => 'mysql',
            'host' => atm('DB_HOST'),
            'name' => atm('DB_NAME'),
            'user' => atm('DB_USER'),
            'pass' => atm('DB_PASS'),
            'port' => atm('DB_PORT')
        ]
    ]
];