<?php 

    include("340generador.php");

    $tam = $_GET["tam"];

    // Función que a partir de un tamaño pasado por parámetro genera una contraseña alfanumérica aleatoria.
    function generaContrasenya(int $tam): string {


        $contrasenya = "";
        for ($i=0; $i < $tam-1; $i++) {
            if ($i % 2 == 0) {
                $contrasenya .= rand(0,9);
            } else {
                $contrasenya .= letraAleatoria();
            }  
        }
        $contrasenya = str_shuffle($contrasenya);
        return $contrasenya;
    }
    echo generaContrasenya($tam);

?>