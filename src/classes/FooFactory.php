<?php

namespace Example;

class FooFactory
{
    public function __invoke($container)  //$container is created by Slim and it's the DIC
    {
        $renderer = $container->get('renderer');  //Here, I'm "accessing" renderer
        return new Foo();
    }
}