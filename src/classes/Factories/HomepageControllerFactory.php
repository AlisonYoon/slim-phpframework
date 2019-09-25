<?php


namespace Example\Factories;


use Example\Controllers\HomepageController;
use Psr\Container\ContainerInterface;


class HomepageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $studentModel = $container->get('StudentModel');
        $homepageController = new HomepageController($renderer, $studentModel); //because The model now is the dependency of the controller, you add it in the Factory class.
        return $homepageController;
    }

}