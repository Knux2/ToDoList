<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;

Class RemoveTaskControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('todoModel');
        return new \Portal\Controller\RemoveTaskController($todoModel);
    }
}