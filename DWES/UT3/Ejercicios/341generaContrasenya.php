<?php 

    include("340generador.php");

    $tam = $_GET["tam"];
    $letras = $_GET["letras"];

    // Función que a partir de un tamaño pasado por parámetro genera una contraseña alfanumérica aleatoria.
    function generaContrasenya(int $tam, int $letras = -1): string {


        $contrasenya = "";
        $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        if ($letras < 0) {

            for ($i=0; $i < $tam; $i++) {
                $contrasenya .= $caracteres[rand(0,strlen($caracteres)-1)];
            }

        } else {

            for ($i=0; $i < $letras; $i++) { 
                $contrasenya .= letraAleatoria();
            }
            for ($i=0; $i < $tam - $letras; $i++) { 
                $contrasenya .= rand(0,9);
            }
        }

        for ($i=0; $i < 3; $i++) { 
            $contrasenya = str_shuffle($contrasenya);
        }
        
        return $contrasenya;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>341generaContrasenya</title>
</head>
<body>
    <p><?= generaContrasenya($tam, $letras) ?></p>
</body>
</html>