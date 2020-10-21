<?php 

    // Función que devuelve la cantidad de cada una de las vocales y el total de ellas.
    function vocales(string $str): array {
        $str = strtolower($str);
        $vocales = [
            'a' => substr_count($str,'a'),
            'e' => substr_count($str,'e'),
            'i' => substr_count($str,'i'),
            'o' => substr_count($str,'o'),
            'u' => substr_count($str,'u'),
            't' => 0
        ];

        $vocales['t'] = array_sum($vocales);
        
        return $vocales;
    }

?>