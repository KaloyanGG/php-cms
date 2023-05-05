<?php include 'includes/header.php' ?>
<?php include 'includes\db_connection.php'; ?>
<!-- In a nutshell: -->
<div class="row my-3">
    <?php include 'views/summary.php' ?>
</div>
<h4>Дата:

    <?php
    setlocale(LC_ALL, 'bg_BG.utf8');
    $currentDate = strftime('%d %B %Y г.');
    echo $currentDate;
    ?>

</h4>
<!-- List of clients -->
<div class="row my-3">
    <?php include 'views/list-of-clients.php' ?>
</div>


<div class="row my-3">

    <a class="col-6 btn btn-primary" href="pages/add_client.php">Добави клиент</a>
    <a class="col-6 btn btn-primary" href="pages/add_product.php">Добави продукт</a>
</div>
<div class="row my-3">
    <!-- Sort -->
    <form class="col-md-6" action="" method='post'>
        <label for="sort">Сортирай по:</label>
        <select name="sort" id="sort">
            <option disabled selected>-- Сортиране --</option>
            <option value="name">Име на клиент</option>
            <option value="type">Вид</option>
            <option value="product">Продукт</option>
            <option value="quantity">Брой продукти</option>
        </select>
        <input class="btn btn-primary" type="submit" value="Сортирай">
    </form>

    <!-- Search -->
    <!-- //! Logic is wrong, people with the 15% have not yet payed the other 85% -->
    <form class="col-md-6" action="" method='post'>
        <label for="search">Търсене на клиенти заплатили над: </label>
        <input value="<?php if (isset($_POST['search'])) echo $_POST['search'] ?>" type="number" name="search" id="search">

        <input class="btn btn-primary" type="submit" value="Търси">
    </form>
</div>

<?php include 'includes/footer.php' ?>