<?php

/*
        Събрана = клиенти_тип_аванс -> брой продукти * цената на продукта 
                    +
                  клиенти_тип_кредитив -> брой продукти * цената на продукта * 0.15

        Очаквана = клиент_тип_кредитив -> брой продукти * цената на продукта * 0.85
                    +
                клиенти_тип_констигация -> брой продукти * цената на продукта

        Общ брой продукти = сума на броя на всички продукти
    */


$collectedSumQueryAvans = "SELECT SUM(c.products_count * p.price) AS sum
FROM clients c
JOIN products p 
WHERE c.product_id = p.id AND c.type_id = 1 ";
$result = $connection->query($collectedSumQueryAvans);
$collectedSum = mysqli_fetch_assoc($result)['sum'];
// echo "collected sum avans: " . $collectedSum;


$collectedSumQueryKreditiv = "SELECT SUM(c.products_count * p.price)*0.15 AS sum
FROM clients c
JOIN products p 
WHERE c.product_id = p.id AND c.type_id = 2 ";
$result = $connection->query($collectedSumQueryKreditiv);
$collectedSum += mysqli_fetch_assoc($result)['sum'];
// echo "collected sum kreditiv: " . $collectedSum;

$expectedSumQueryKreditiv = "SELECT SUM(c.products_count * p.price)*0.85 AS sum
FROM clients c
JOIN products p 
WHERE c.product_id = p.id AND c.type_id = 2 ";
$result = $connection->query($expectedSumQueryKreditiv);
$expectedSum = mysqli_fetch_assoc($result)['sum'];
// echo "expected sum kreditiv: " . $expectedSum;

$expectedSumQueryKonstigaciq = "SELECT SUM(c.products_count * p.price) AS sum
FROM clients c
JOIN products p 
WHERE c.product_id = p.id AND c.type_id = 3 ";
$result = $connection->query($expectedSumQueryKonstigaciq);
$expectedSum += mysqli_fetch_assoc($result)['sum'];





$query = "select sum(products_count) as sum FROM clients ";
$select_query = $connection->query($query);
$totalProducts = mysqli_fetch_assoc($select_query)['sum'];
?>

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
            <td><?php echo number_format($collectedSum, 2); ?>лв</td>
            <td><?php echo number_format($expectedSum, 2); ?>лв</td>
            <td><?php echo $totalProducts; ?></td>
        </tr>
    </tbody>
</table>