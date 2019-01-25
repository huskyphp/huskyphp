<?php
/*
    | INCLUDING GLOBAL METHODS
    |--------------------------------------------------------------------------
*/
require 'methods.php';
/*
    | INCLUDING ENVIRONMENT VARIABLES
    |--------------------------------------------------------------------------
*/
$dotenv = new Dotenv\Dotenv(realpath(__DIR__ . '/..'));
$dotenv->load();
/*
    | INCLUDING APP CONFIGURATION SETINGS
    |--------------------------------------------------------------------------
*/
require(realpath(__DIR__.'/../config/settings.php'));
$configuration = [
    'settings' => $settings
];
/*
    | OBTAINING SLIM CONTAINER
    |--------------------------------------------------------------------------
*/
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
$container = $app->getContainer();
/*
    | IMPORTING DATABASE DEPENDENCY
    |--------------------------------------------------------------------------
*/
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection($settings['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
/*
    | CONTROLLER DEPENDENCIES GOES HERE
    |--------------------------------------------------------------------------
*/
$container['HomeController'] = function ($container)
{
    return new App\Controller\HomeController();
};