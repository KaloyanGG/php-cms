<?php

class ProductDAO
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM products";
        $result = $this->connection->query($query);
        return $result;
    }
    public function addProduct($name, $price)
    {
        $stmt = $this->connection->prepare('INSERT INTO products (name, price) VALUES (?, ?)');
        try {
            return $stmt->execute([$name, $price]);
        } catch (Exception $e) {
            return $e->getCode();
        }
    }
}
