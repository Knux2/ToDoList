<?php

namespace Portal\Controller;

use Portal\Model\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

Class RemoveTaskController
{
    private $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $removeTask = $request->getParsedBody();
        $taskInfo = $removeTask['removeTask'];
        $this->todoModel->removeTask($taskInfo);
        return $response->withRedirect('/todo');
    }

    public function hiddenInput($taskId)
    {
        return '<input type="hidden" name="newId" value="'.$taskId.'">';
    }
}