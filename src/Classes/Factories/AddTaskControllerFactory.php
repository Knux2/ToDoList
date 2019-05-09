<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;

Class AddTaskControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('todoModel');
        return new \Portal\Controller\AddTaskController($todoModel);
    }
}