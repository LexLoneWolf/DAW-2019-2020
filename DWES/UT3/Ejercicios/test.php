<?php 

    include("330fraseImpares.php");
    include("331vocales.php");
    include("332analizador.php");
    $str = $_GET["str"];
    $vocales = vocales($str);
    $analizado = analizador($str);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
    <p><?= $str ?></p>
    <p>FRASE IMPARES</p>
    <?php 
        
        echo fraseImpares($str) . "<br />";
    ?>

    <p>VOCALES</p>
    <?php 
    
        echo "La frase: $str contiene un total de " . $vocales['t'] . " vocales<br /><br />";
        foreach ($vocales as $vocal => $value) {
            if ($vocal != 't') {
                echo "La vocal " . $vocal . " aparece " . $value . " veces<br />";
            }
        }?>

    <p>ANALIZADOR</p>
    <?= $str ?>
    <p>Cantidad de letras: <?= $analizado['totalLetras'] ?></p>
    <p>Cantidad de palabras: <?= $analizado['totalPalabras'] ?></p>
    <ul>
    <?php
    foreach ($analizado as $key => $value) {
        if ($key == 'letrasxPalabra') {
            foreach ($value as $palabra => $cantLetras) { ?>
                <li><?= $palabra ?>: <?= $cantLetras ?> letras</li>
            <?php }
        } ?>
    <?php } ?>
    </ul>

</body>
</html>