<?php include '../includes/db_connection.php'; ?>
<?php include '../includes/header.php' ?>


<?php

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    if (empty(trim($name))) {
        echo '<script defer>alert("Моля попълнете всички полета")</script>';
    } else {

        require_once '../dao/product_DAO.php';
        $productDAO = new ProductDAO($connection);
        $result = $productDAO->addProduct($name, $price);

        if ($result === 1062) {
            echo '<script defer>alert("Продуктът вече съществува")</script>';
        } else {
            header('Location: /php-cms');
        }
    }
}

?>


<form action="" method="post" class="p-4 col-10 mx-auto border border-primary" enctype="multipart/form-data">
    <h1 class="text-center">Добави продукт</h1>
    <div class="row mb-3">
        <label for="name" class="col-2 col-form-label">Име</label>
        <div class="col-10">
            <input autofocus required type="name" class="form-control col-10" name="name" id="name">
        </div>
    </div>
    <div class="row mb-3">
        <label for="price" class="col-2 col-form-label">Цена</label>
        <div class="col-10">
            <input required type="number" class="form-control col-10" name="price" id="price">
        </div>
    </div>

    <div class="row">
        <button type="submit" name="add" class="btn btn-primary col-3 mx-auto">Добави</button>
    </div>

</form>

<?php include '../includes/footer.php' ?>