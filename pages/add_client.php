<?php include '../includes/db_connection.php'; ?>
<?php include '../includes/header.php' ?>


<?php

require_once '../dao/client_DAO.php';

$clientDAO = new ClientDAO($connection);

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $product = $_POST['product'];
    $count = $_POST['count'];

    if (empty(trim($name))) {
        echo '<script defer>alert("Моля попълнете всички полета")</script>';
    } else {

        $result = $clientDAO->addClient($name, $type, $product, $count);

        header('Location: /php-cms');
    }
}



?>


<form action="" method="post" class="p-4 col-10 mx-auto border border-primary" enctype="multipart/form-data">
    <h1 class="text-center">Добави клиент</h1>
    <div class="row mb-3">
        <label for="name" class="col-2 col-form-label">Име</label>
        <div class="col-10">
            <input required type="name" class="form-control col-10" name="name" id="name">
        </div>
    </div>
    <div class="row mb-3">
        <?php



        ?>
        <label for="type" class="col-2 col-form-label">Вид плащане</label>
        <div class="col-10">
            <select required class="form-select" name="type" id="type">
                <option value='' selected disabled>-- Изберете вид --</option>
                <?php

                require_once '../dao/client_type_DAO.php';
                $clientTypesDAO = new ClientTypeDAO($connection);
                $result = $clientTypesDAO->getAllClientTypes();

                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }

                ?>
            </select>
        </div>

    </div>
    <div class="row mb-3">
        <label for="product" class="col-2 col-form-label">Продукт</label>
        <div class="col-10">
            <select required class="form-select" name="product" id="product">
                <option disabled selected>-- Изберете продукт --</option>
                <?php

                require_once '../dao/product_DAO.php';
                $clientTypesDAO = new ProductDAO($connection);
                $result = $clientTypesDAO->getAllProducts();

                while ($row = mysqli_fetch_assoc($result)) {
                    $price = number_format($row['price'], 2);
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '  ' . $price .  'лв. </option>';
                }

                ?>

            </select>
        </div>
    </div>
    <div class="row mb-3">

        <label for="count" class="col-2 col-form-label">Брой</label>
        <div class="col-10">

            <input required type="number" class="form-control" name="count" id="count" placeholder="Въведете количество">
        </div>

    </div>
    <div class="row">
        <button type="submit" name="add" class="btn btn-primary col-3 mx-auto">Добави</button>
    </div>

</form>

<?php include '../includes/footer.php' ?>