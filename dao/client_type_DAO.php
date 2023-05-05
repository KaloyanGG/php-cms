<?php

class ClientTypeDAO
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllClientTypes()
    {
        $query = "SELECT * FROM client_types";
        $result = $this->connection->query($query);
        return $result;
    }
}
