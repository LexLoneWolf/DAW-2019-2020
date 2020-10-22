<?php 

    include("330fraseImpares.php");
    include("331vocales.php");
    include("332analizador.php");
    include("332analizadorWC.php");
    include("333cani.php");
    include("334palindromo.php");
    $str = $_GET["str"];
    $vocales = vocales($str);
    $analizado = analizador($str);
    $analizadoWC = analizadorWC($str);
    $cani = cani($str);
    $palindromo = palindromo($str);
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

    <p>ANALIZADOR WC</p>
    <?= $str ?>
    <p>Cantidad de letras: <?= $analizadoWC['totalLetras'] ?></p>
    <p>Cantidad de palabras: <?= $analizadoWC['totalPalabras'] ?></p>
    <ul>
    <?php
    foreach ($analizadoWC as $key => $value) {
        if ($key == 'letrasxPalabra') {
            foreach ($value as $palabra => $cantLetras) { ?>
                <li><?= $palabra ?>: <?= $cantLetras ?> letras</li>
            <?php }
        } ?>
    <?php } ?>
    </ul>

    <p>CANI</p>

    <?php 

        echo $cani;
    
    ?>

    <p>PALINDROMO</p>

    <?php 
    
        if (!$palindromo) {   
            echo "$str no es palíndromo";
        } else {
            echo "$str es palíndromo";
        }
        
    ?>


</body>
</html>