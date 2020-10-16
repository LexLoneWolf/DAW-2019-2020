<?php 

    include_once("323euros.php");
    $cantidad = $_GET["cantidad"];
    $cotizacion = $_GET["cotizacion"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>323calculadoraEuros</title>
</head>
<body>
    <?php
    echo "$cantidad Peseta/s son " . pesetas2Euros($cantidad,$cotizacion) . "€ <br />";
    echo "$cantidad Euro/s son " . euros2Pesetas($cantidad,$cotizacion) . "pts";
    ?>

</body>
</html>
