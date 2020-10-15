<?php 
    include("328biblioteca.php");
    $n1 = $_GET["n1"];
    $n2 = $_GET["n2"];
    $arrayFunciones = [
        "sumar",
        "restar",
        "multiplicar",
        "dividir"
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>328arrayFunciones</title>
</head>
<body>
    <?php
    for ($i=0; $i < count($arrayFunciones); $i++) { ?>
        <p><?= $arrayFunciones[$i] . " $n1, $n2" ?></p>
        <p><?= $arrayFunciones[$i]($n1, $n2) ?></p>
    <?php } ?>
</body>
</html>