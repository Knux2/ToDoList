<?php

namespace Portal\Factories;

use Portal\Model\TodoModel;

Class TodoModelFactory
{
    public function __invoke($container)
    {
        $db = $container['dbConnection'];
        return new TodoModel($db);
    }
}