<?php


namespace Example\Factories;


use Example\Models\StudentModel;

class StudentModelFactory
{
    public function __invoke($container)
    {
        $db = $container->get('db');
        $model = new StudentModel($db);
        return $model;
    }

}