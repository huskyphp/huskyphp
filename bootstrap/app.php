<?php
require 'methods.php';
$dotenv = new Dotenv\Dotenv(realpath(__DIR__ . '/..'));
$dotenv->load();
require '../config/settings.php';
$configuration = [
    'settings' => $settings
];

$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
$container = $app->getContainer();

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection($settings['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['HomeController'] = function ($container)
{
    return new App\Controller\HomeController();
};
