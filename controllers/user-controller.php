<?php

include '../includes/db_connection.php';
if (isset($_GET['delete'])) {
    // Handle the delete request
    $id = $_GET['delete'];
    $stmt = $connection->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->execute([$id]);

    // Redirect the user to the table view
    header('Location: /php-cms');
    exit;
}
