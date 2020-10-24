<?php 

    $str = $_GET["str"];
    $desplazamiento = $_GET["desplazamiento"];
    //Función que cifra una cadena con un desplazamiento n.
    function codificar(string $str, int $desplazamiento ): string {
        $tam = strlen($str);
        for ($i=0; $i < $tam; $i++) { 
            if (ctype_alpha($str[$i])) {
                if (ord($str[$i]) + $desplazamiento > ord('z')) {
                    $str[$i] = chr(ord('a') + ((ord($str[$i]) + $desplazamiento) - ord('z'))-1);
                } else if (ord($str[$i]) >= ord('A') && ord($str[$i]) <= ord('Z') && ord($str[$i]) + $desplazamiento > ord('Z')){
                    $str[$i] = chr(ord('A') + ((ord($str[$i]) + $desplazamiento) - ord('Z'))-1);
                } else {
                    $str[$i] = chr(ord($str[$i])+$desplazamiento);
                }
            } 
        }
        return $str;
    }   

    echo codificar($str, $desplazamiento);

?>