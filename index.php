<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadacha 16</title>

    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>

<body>

    <body>
        <div class="container">
            <!-- In a nutshell: -->
            <div class="row my-3">
                <table class="col-md-12 table">
                    <thead>
                        <tr>
                            <th class="col-md-4">Събрана сума</th>
                            <th class="col-md-4">Очаквана сума </th>
                            <th class="col-md-4">Общ брой продукти</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1000.00</td>
                            <td>2000.00</td>
                            <td>300</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- List of clients -->
            <div class="row my-3">
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
                        <tr>
                            <td>Иван</td>
                            <td>авансово</td>
                            <td>кола</td>
                            <td>2</td>
                            <td>
                                <a href="">Редактиране</a>
                                <a href="">Изтриване</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Петър Калинов</td>
                            <td>кредитив</td>
                            <td>диван</td>
                            <td>10</td>
                            <td>
                                <a href="">Редактиране</a>
                                <a href="">Изтриване</a>
                            </td>

                        </tr>
                        <tr>
                            <td>Георги</td>
                            <td>констигация</td>
                            <td>лампа</td>
                            <td>8</td>
                            <td>
                                <a href="">Редактиране</a>
                                <a href="">Изтриване</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row my-3">

                <a class="col-md-6 btn btn-primary" href="add_client.php" class="btn btn-primary">Добави клиент</a>
                <a class="col-md-6 btn btn-primary" href="add_product.php" class="btn btn-primary">Добави продукт</a>
            </div>
            <div class="row my-3">
                <form class="col-md-6" action="">
                    <label for="sort">Сортирай по:</label>
                    <select name="sort" id="sort">
                        <option value="name">Име на клиент</option>
                        <option value="type">Вид</option>
                        <option value="product">Продукт</option>
                        <option value="quantity">Брой продукти</option>
                    </select>
                    <input class="btn btn-primary" type="submit" value="Сортирай">
                </form>
                <form class="col-md-6" action="">
                    <label for="search">Търсене на клиенти заплатили над: </label>
                    <input type="number" name="search" id="search">
                    <input class="btn btn-primary" type="submit" value="Търси">
                </form>
            </div>
        </div>

    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</html>