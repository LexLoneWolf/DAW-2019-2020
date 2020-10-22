<?php 

    $str = $_GET["str"];

    // Función que recibe una cadena y devuelve el número de letras y palabras
    function analizador(string $str): array {

        $palabras = explode(" ", $str);
        $analizado = [
            'totalLetras' => strlen(str_replace(" ", "",$str)),
            'totalPalabras' => count($palabras),
            'letrasxPalabra' => array()
        ];
       
        for ($i=0; $i < count($palabras); $i++) { 
            $analizado['letrasxPalabra'][$palabras[$i]] = strlen($palabras[$i]);
        }
        
        return $analizado;
    }

    $analizador = analizador($str);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>analizador</title>
</head>
<body>
<p>ANALIZADOR</p>
    <?= $str ?>
    <p>Cantidad de letras: <?= $analizador['totalLetras'] ?></p>
    <p>Cantidad de palabras: <?= $analizador['totalPalabras'] ?></p>
    <ul>
    <?php
    foreach ($analizador as $key => $value) {
        if ($key == 'letrasxPalabra') {
            foreach ($value as $palabra => $cantLetras) { ?>
                <li><?= $palabra ?>: <?= $cantLetras ?> letras</li>
            <?php }
        } ?>
    <?php } ?>
    </ul>
</body>
</html>