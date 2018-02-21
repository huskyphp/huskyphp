<?php

session_start();
/*
    | APPLICATION AUTOLOAD
    |--------------------------------------------------------------------------
*/
require __DIR__ . '/../vendor/autoload.php';
/*
    | BOOTSTRAPPING THE APPLICATION
    |--------------------------------------------------------------------------
*/
require '../bootstrap/app.php';
/*
    | SETTING UP APP TIMEZONE
    |--------------------------------------------------------------------------
*/
date_default_timezone_set(atm('APP_TIMEZONE'));
/*
    | LOADING APPLICATION ROUTES
    |--------------------------------------------------------------------------
*/
require __DIR__.'/../routes.php';
/*
    | RUNNING THE APPLICATION
    |--------------------------------------------------------------------------
*/
$app->run();