<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Избор на курсове</title>
</head>

<body>

    <h1>Избор на курсове</h1>
    <?php

    $prices = [
        'php' => 200,
        'html' => 100,
        'javascript' => 150,
        'java' => 250
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['courses']) && isset($_POST['forma']) && isset($_POST['name'])) {
            $courses = $_POST['courses'];
            $forma = $_POST['forma'];
            $name = $_POST['name'];
        } else {
            echo "Веведете всичко";
        }
    }
    ?>
    <h5>Въведеното име е <?php echo $name; ?></h5>
    <h5><?php echo $forma; ?> обучение</h5>
    <h5>Избрани курсове:</h5>
    <ul>
        <?php
        foreach ($courses as $course) {
            echo "<li>$course; </li>";
        }
        ?>
    </ul>
    <h5>Сума за плащане:
        <?php
        $sum = 0;
        foreach ($courses as $course) {
            $sum += $prices[$course];
        }
        echo $sum;
        ?> лева
    </h5>
</body>

</html>