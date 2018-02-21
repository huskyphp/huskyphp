<?php



$app->get('/',function (){
   return template('home.html');
});

$app->get('/home','HomeController:index');