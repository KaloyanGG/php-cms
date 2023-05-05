<table class="col-md-12 table">
    <thead>
        <tr>
            <th>Име на клиент</th>
            <th>Вид</th>
            <th>Продукт</th>
            <th>Брой продукти</th>
            <th>Операции</th>
        </tr>
    </thead>
    <tbody>
        <?php

        require_once './dao/client_DAO.php';
        $userDAO = new ClientDAO($connection);


        // echo "Сетнато ли SORT: ";
        // echo isset($_POST['sort']) ? "да <br>" : "не <br>";
        // echo "Сетнато ли SEARCH: ";
        // echo isset($_POST['search']) ? "да" : "не";


        if (isset($_POST['sort'])) {
            $sort = $_POST['sort'];
            $result = $userDAO->getAllClients($_POST['sort']);
            // unset($_POST['sort']);
        } else if (isset($_POST['search']) && $_POST['search'] != "") {

            $search = $_POST['search'];
            $result = $userDAO->getAllClientsWhoPaidMoreThan($_POST['search']);
            // unset($_POST['search']);
        } else {
            $result = $userDAO->getAllClients();
        }



        while ($row = $result->fetch_assoc()) {
            $client_id = $row['id'];
            $client_name = $row['name'];
            $client_type = $row['type'];
            $product = $row['product'];
            $quantity = $row['quantity'];
            echo "<tr>";
            echo "<td>$client_name</td>";
            echo "<td>$client_type</td>";
            echo "<td>$product</td>";
            echo "<td>$quantity</td>";
            echo "<td>";
            echo "<a class='btn btn-sm btn-info' href='pages/edit_client.php?id=$client_id'>Редактиране</a>";
            echo "<a class='btn btn-sm btn-danger' href='controllers/user-controller.php?delete=$client_id'>Изтриване</a>";
            echo "</td>";
            echo "</tr>";
        }





        ?>

    </tbody>
</table>