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
        $args['tasks'] = $this->todoModel->addTask();
        $this->renderer->render($response, 'todoList.phtml', $args);
    }
}