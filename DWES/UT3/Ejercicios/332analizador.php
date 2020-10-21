<?php 

    // Función que recibe una cadena y devuelve el número de letras y palabras
    function analizador(string $str): array {

        
        $palabras = explode(" ", $str);
        trim($str);
        $letras = str_split($str);

        $analizado = [
            'totalLetras' => array_sum($letras),
            'totalPalabras' => array_sum($palabras),
            'letrasxPalabra' => array()
        ];
        
        for ($i=0; $i < count($palabras); $i++) { 
            $cantLetrasPalabra = strlen($palabras[$i]);
            $analizado['letrasxPalabra'] = $palabras[$i] => $cantLetrasPalabra;
        }

        return $analizado;
    }

?>