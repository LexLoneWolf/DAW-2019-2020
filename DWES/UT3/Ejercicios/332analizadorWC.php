<?php 

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
?>