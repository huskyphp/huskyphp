<?php



$app->get('/',function (){
   return template('home.html');
});

$app->get('/ok','HomeController:index');