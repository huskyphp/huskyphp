<?php

session_start();

date_default_timezone_set('Asia/Kolkata');
setlocale (LC_TIME, 'fr_FR.utf8','fra');

require __DIR__ . '/../vendor/autoload.php';

require '../bootstrap/app.php';
require __DIR__.'/../routes.php';

$app->run();