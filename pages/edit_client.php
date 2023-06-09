<?php include '../includes/db_connection.php'; ?>
<?php include '../includes/header.php' ?>


<?php

require_once '../dao/client_DAO.php';
$clientDAO = new ClientDAO($connection);

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $type_id = $_POST['type'];
    $product_id = $_POST['product'];
    $count = $_POST['count'];

    $id = $_GET['id'];


    if (empty(trim($name))) {
        echo '<script defer>alert("Моля попълнете всички полета")</script>';
    } else {
        $result = $clientDAO->updateClient($id, $name, $type_id, $product_id, $count);
        header('Location: /php-cms');
    }
}

if (!isset($_GET['id'])) {
    header('Location: /php-cms');
} else {
    $id = $_GET['id'];
    $result = $clientDAO->getClientById($id);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $type = $row['type_id'];
    $product = $row['product_id'];
    $count = $row['products_count'];

    // echo $name . "<br>";
    // echo $type . "<br>";
    // echo $product . "<br>";
    // echo $count . "<br>";
}

?>


<form action="" method="post" class="p-4 col-10 mx-auto border border-primary" enctype="multipart/form-data">
    <h1 class="text-center">Редактиране на клиент</h1>

    <div class="row mb-3">
        <label for="name" class="col-2 col-form-label">Име</label>
        <div class="col-10">
            <input required type="name" value="<?php echo $name ?>" class="form-control col-10" name="name" id="name">
        </div>
    </div>

    <div class="row mb-3">
        <label for="type" class="col-2 col-form-label">Вид плащане</label>
        <div class="col-10">
            <select required class="form-select" name="type" id="type">
                <option value='' selected disabled>-- Изберете вид --</option>
                <?php

                require_once '../dao/client_type_DAO.php';
                $clientTypesDAO = new ClientTypeDAO($connection);
                $result = $clientTypesDAO->getAllClientTypes();

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option' . ($type == $row['id'] ? ' selected' : '') . ' value="' . $row['id'] . '">' . $row['name'] . '</option>';
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
                    echo '<option' . ($product == $row['id'] ? ' selected' : '') . ' value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['name'] . ' - ' . $price . ' лв.' . '</option>';
                }

                ?>

            </select>
        </div>
    </div>
    <div class="row mb-3">

        <label for="count" class="col-2 col-form-label">Брой</label>
        <div class="col-10">

            <input required value="<?php echo $count; ?>" type="number" class="form-control" name="count" id="count" placeholder="Въведете количество">
        </div>


    </div>
    <div class="row">
        <button type="submit" name="add" class="btn btn-primary col-3 mx-auto">Добави</button>
    </div>

</form>

<?php include '../includes/footer.php' ?>