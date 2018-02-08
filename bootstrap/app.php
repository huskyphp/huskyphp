<?php

//function for rendering templates
function template($template, $parameters=[]) {

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
        'cache' => '../storage/cache',
        'debug'=>true
    ));
    return $twig->render($template,$parameters);
}
