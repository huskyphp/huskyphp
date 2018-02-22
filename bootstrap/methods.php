<?php
/**
 * FUNCTION FOR RENDERING TEMPLATES
 * @param $template
 * @param array $parameters(optional)
 * @return string
 */
    function template($template, $parameters=[])
    {
            /*
            | LOADING TWIG CLASS
            |--------------------------------------------------------------------------
            */
            $loader = new Twig_Loader_Filesystem('../templates');
            $twig = new Twig_Environment($loader, array(
                'cache' => '../storage/cache',
                'debug'=>true
            ));
             /*
             | LOADING TWIG CLASS
             |--------------------------------------------------------------------------
             */
            return $twig->render($template,$parameters);
    }

/**
 * FUNCTION FOR ACCESSING ENVIROMENT VARIABLES
 * @param $value
 * @return array|false|string
 */
    function atm($value)
    {
        /*
        | RETURNING IN BUILT VALUE FROM FUNCTION GETEV()
        |--------------------------------------------------------------------------
        */
        try
        {
            return getenv($value);
        }
        catch (Exception $e)
        {
            return NULL;
        }
    }