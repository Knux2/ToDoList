<?php

namespace Portal\Controller;

use Portal\Model\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

Class ViewFirstListController
{
    private $renderer;
    private $todoModel;

    public function __construct(PhpRenderer $renderer, TodoModel $todoModel)
    {
        $this->renderer = $renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $args['tasks'] = $this->todoModel->getTaskList();
        $args['todoLists'] = $this->todoModel->getTodoLists();
        $this->renderer->render($response, 'todoList.phtml', $args);
    }
}