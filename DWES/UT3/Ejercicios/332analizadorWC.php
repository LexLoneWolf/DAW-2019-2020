<?php 

    $str = $_GET["str"];

    // Función que recibe una cadena y devuelve el número de letras y palabras
    function analizadorWC(string $str): array {
        
        $palabras = str_word_count($str, 1);
        $analizado = [
            'totalLetras' => strlen(str_replace(" ", "",$str)),
            'totalPalabras' => str_word_count($str),
            'letrasxPalabra' => array() 
        ];

        for ($i=0; $i < str_word_count($str); $i++) { 
           $analizado['letrasxPalabra'][$palabras[$i]] = strlen($palabras[$i]);
        }
        return $analizado;
    }

    $analizadoWC = analizadorWC($str);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>analizadorWC</title>
</head>
<body>
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
</body>
</html>