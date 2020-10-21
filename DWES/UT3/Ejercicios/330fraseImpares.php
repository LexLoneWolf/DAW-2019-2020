<?php 

    // Función que lee una frase y devuelve una nueva con sólo los caracteres de posiciones impares
    function fraseImpares(string $str): string {
        $arrayAux = str_split($str);
        $str2 = "";
        for ($i=0; $i < count($arrayAux); $i++) { 
            if ($i % 2 == 0) {
                $str2 .= $arrayAux[$i];
            }
        }
        return $str2;
    }
?>