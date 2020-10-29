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

    echo letraAleatoria();
?>