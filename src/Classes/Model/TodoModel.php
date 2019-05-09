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
        $query = $this->dbConnection->prepare("SELECT `id`, `task` FROM `list_table`");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addList($id, $task)
    {
        $query = $this->dbConnection->prepare("INSERT INTO `list_table` (`id`, `task`) VALUES (:id, :task)");
        $query->bindParam(':id', $id);
        $query->bindParam(':task', $task);
        $query->execute();
    }
}
