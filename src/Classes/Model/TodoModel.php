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
        $query = $this->dbConnection->prepare("SELECT `id`, `task`, `list_selection` FROM `list_table`");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addTask($task)
    {
        $query = $this->dbConnection->prepare("INSERT INTO `list_table` (`task`) VALUES (:task)");
        $query->bindParam(':task', $task);
        $query->execute();
    }

    public function removeTask($deleteTask)
    {
        $query = $this->dbConnection->prepare("UPDATE `list_table` SET `deleted` = 1 WHERE `id` = :deleteTask;");
        $query->bindparam(':deleteTask', $deleteTask);
        $query->execute();
    }

    public function listChoices()
    {
        $query = $this->dbConnection->prepare("SELECT `id`, `to_do_list` FROM `choose_todos`");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
