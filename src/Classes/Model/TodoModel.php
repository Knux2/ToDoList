<?php

namespace Portal\Model;

Class TodoModel
{
    private $dbConnection;

    public function __construct($db)
    {
        $this->dbConnection = $db;
    }

    public function getList()
    {
        $query = $this->dbConnection->prepare("SELECT `list_table`.`id`, `list_table`.`task`, `list_table`.`list_selection`, `choose_todos`.`to_do_list` FROM `list_table`
                                                LEFT JOIN `choose_todos`
                                                ON `list_table`.`list_selection` = `choose_todos`.`id`");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addTask($task, $listSelection)
    {
        $query = $this->dbConnection->prepare("INSERT INTO `list_table` (`task`, `list_selection`) VALUES (:task, :list_selection)");
        $query->bindParam(':task', $task);
        $query->bindParam(':list_selection', $listSelection);
        $query->execute();
    }

    public function removeTask($deleteTask)
    {
        $query = $this->dbConnection->prepare("UPDATE `list_table` SET `deleted` = 1 WHERE `id` = :deleteTask;");
        $query->bindparam(':deleteTask', $deleteTask);
        $query->execute();
    }
}