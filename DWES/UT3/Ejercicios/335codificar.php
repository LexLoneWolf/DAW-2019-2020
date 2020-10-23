<?php 

    $str = $_GET["str"];
    $desplazamiento = $_GET["desplazamiento"];
    //Función que cifra una cadena con un desplazamiento n.
    function codificar(string $str, int $desplazamiento ): string {
        $tam = strlen($str);
        for ($i=0; $i < $tam; $i++) { 
            if (ctype_alpha($str)) {
                if ($str[$i] >= ord('A') && $str[$i] <= ord('z')) {
                    $str[$i] = chr(ord($str[$i]+$desplazamiento));
                } else if (ord($str[$i]) + $desplazamiento > ord('z')) {
                    $str[$i] = chr((ord('a') + ((ord($str[$i]) + $desplazamiento)- ord('z')))-1);
                }    
            }
        }
        return $str;
    }   

    echo codificar($str, $desplazamiento);

?>