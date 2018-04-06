<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;



$app = new Application('Console App', 'v1.0.0');

$app -> add(new \Console\CreateModel());
$app -> add(new \Console\CreateController());
$app -> add(new \Console\CreateVirtualHost());
$app -> add(new \Console\CreateTemplate());
$app -> run();