<?php

class ClientDAO
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllClients($orderBy = null)
    {
        $query = "SELECT c.id, c.name as name, c.products_count as quantity, p.name as product, t.name as 'type' FROM clients c ";
        $query .= "INNER JOIN products p ON c.product_id = p.id ";
        $query .= "INNER JOIN client_types t ON c.type_id = t.id";
        if ($orderBy) {
            $query .= " ORDER BY $orderBy";
        }
        $result = $this->connection->query($query);
        return $result;
    }
    public function getAllClientsWhoPaidMoreThan($price)
    {
        $query =  "SELECT c.id, c.name, c.products_count as quantity, p.name as product, t.name as 'type' FROM clients c ";
        $query .= "INNER JOIN products p ON c.product_id = p.id ";
        $query .= "INNER JOIN client_types t ON c.type_id = t.id ";
        $query .= "WHERE (c.products_count * p.price) > $price";
        $result = $this->connection->query($query);
        return $result;
    }

    public function addClient($name, $type_id, $product_id, $products_count)
    {
        $stmt = $this->connection->prepare('INSERT INTO clients (name, type_id, product_id, products_count) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$name, $type_id, $product_id, $products_count]);
    }


    public function getClientById($id)
    {
        $query = "SELECT * FROM clients WHERE id = $id";
        $result = $this->connection->query($query);
        return $result;
    }

    public function updateClient($id, $name, $type_id, $product_id, $products_count)
    {
        $stmt = $this->connection->prepare('UPDATE clients SET name = ?, type_id = ?, product_id = ?, products_count = ? WHERE id = ?');
        return $stmt->execute([$name, $type_id, $product_id, $products_count, $id]);
    }

    // public function createClient($name, $type_id, $product_id, $products_count)
    // {
    //     $stmt = $this->connection->prepare('INSERT INTO clients (name, type_id, product_id, products_count) VALUES (?, ?, ?, ?)');
    //     $stmt->execute([$name, $type_id, $product_id, $products_count]);
    //     return $this->connection->lastInsertId();
    // }
    public function closeConnection()
    {
        $this->connection->close();
    }
}
