<?php

namespace App\Controller;

use Interop\Container\ContainerInterface;

abstract class Controller implements ContainerInterface
{

    protected $container;
    /**
     * Controller constructor.
     * @param Container $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

    }

    public function ok()
    {
        return 'ok';
    }

}