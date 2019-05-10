<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;

Class ViewSecondListControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('todoModel');
        $dbConnection = $container->get('dbConnection');
        return new \Portal\Controller\ViewSecondListController($renderer, $todoModel, $dbConnection);
    }
}