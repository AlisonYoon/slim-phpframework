<?php


namespace Example\Factories;


use Example\Controllers\HomepageController;


class HomepageControllerFactory
{
    public function __invoke(ContainerInter$container)
    {
        $renderer = $container->get('renderer');
        $homepageController = new HomepageController($renderer);
        return $homepageController;
    }

}