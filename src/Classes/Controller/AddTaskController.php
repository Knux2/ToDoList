<?php

namespace Portal\Controller;

use Portal\Model\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

Class AddTaskController
{
    private $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $newTask = $request->getParsedBody();
        $taskInfo = $newTask['addTask'];
        $this->todoModel->addTask($taskInfo);
        return $response->withRedirect('/todo');
    }
}