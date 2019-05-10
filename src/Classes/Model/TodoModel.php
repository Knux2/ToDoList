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
        $query = $this->dbConnection->prepare("SELECT `id`, `task` FROM `list_table` WHERE `deleted` = 0");
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
}
