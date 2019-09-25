<?php


namespace Example\Factories;


use Example\Controllers\HomepageController;
use Psr\Container\ContainerInterface;


class HomepageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $homepageController = new HomepageController($renderer);
        return $homepageController;
    }

}