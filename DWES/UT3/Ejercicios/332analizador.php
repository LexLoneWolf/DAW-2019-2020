<?php 

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
?>