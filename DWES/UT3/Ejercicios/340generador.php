<?php 

    // Función que genera una contraseña aleatoria en mayúsculas y minúsculas.
    function letraAleatoria(): string {
    
    $letra = "";
    do {
        $asciiLetra = rand(65,122);
        $letra = chr($asciiLetra);
    } while (!ctype_alpha($letra));

    return $letra;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>340generador</title>
</head>
<body>
    <p><?= letraAleatoria() ?></p>
</body>
</html>