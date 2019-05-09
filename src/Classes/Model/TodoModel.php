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
}
