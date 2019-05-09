<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;

Class AddTaskControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('todoModel');
        $dbConnection = $container->get('dbConnection');
        return new \Portal\Controller\AddTaskController($renderer, $todoModel, $dbConnection);
    }
}