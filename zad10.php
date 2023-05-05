<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Избор на курсове</title>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['courses'])) {
        $courses = $_POST['courses'];
        foreach ($courses as $course) {
            echo "Избрахте: $course<br>";
        }
    } else {
        echo "Моля изберете поне 1 курс.";
    }
}
?>


<body>
    <h1>Избор на курсове</h1>

    <form action="zad10-result.php" method="post">
        <h5>Задайте име на клиента</h5>
        <input type="text" name="name" id="name" required>
        <h5>Изберете форма на курса:</h5>
        <select name="forma" id="forma" required>
            <option value="Редовно">Редовно обучение</option>
            <option value="Задочно">Задочно обучение</option>
            <option value="Дистанционно">Дистанционно обучение</option>
        </select>
        <br>
        <h5>Изберете един или повече курсове:</h5>
        <select name="courses[]" id="courses" multiple>
            <option value="php">PHP => 200 лева</option>
            <option value="html">HTML => 100 лева</option>
            <option value="javascript">JavaScript => 150 лева</option>
            <option value="java">Java => 250 лева</option>
        </select>
        <button style="display:block" type="submit">Потвърдете</button>
    </form>

</body>

</html>