<?php
require 'methods.php';
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
$container = $app->getContainer();

$container['HomeController'] = function ($container)
{
    return new App\Controller\HomeController();
};
