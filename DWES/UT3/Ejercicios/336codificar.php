<?php 

    $str = $_GET["str"];
    $desp = $_GET["desp"];
    //Función que cifra una cadena con un desplazamiento desp.
    function codificar(string $str, int $desp): string {
        $tam = strlen($str);

        if ($desp < 0) {
            $str = "El desp no puede ser negativo";
        } else {
            for ($i=0; $i < $tam; $i++) { 
                $ord_i = ord($str[$i]);
                if (ctype_alpha($str[$i])) {
                    if ($ord_i + $desp > ord('z')) {
                        $str[$i] = chr(ord('a') + (($ord_i + $desp) - ord('z'))-1);
                    } else if ($ord_i >= ord('A') && $ord_i <= ord('Z') && $ord_i + $desp > ord('Z')){
                        $str[$i] = chr(ord('A') + (($ord_i + $desp) - ord('Z'))-1);
                    } else {
                        $str[$i] = chr($ord_i + $desp);
                    }
                } 
            }
        }   
        return $str;
    }   
    //Función que descifra una cadena con un desplazamiento desp.
    function decodificar(string $str, int $desp): string {

        $tam = strlen($str);

        if (!$desp < 0) {
            $str = "El desp debe ser negativo";
        } else {
            for ($i=0; $i < $tam; $i++) {
                $ord_i = ord($str[$i]);  
                if (ctype_alpha($str[$i])) {
                    if ($ord_i - $desp < ord('A')) {
                        $str[$i] = chr(ord('Z') - ( ord('A') - ($ord_i - $desp))+1);
                    } else if ($ord_i >= ord('a') && $ord_i <= ord('z') && $ord_i - $desp < ord('a')) {
                        $str[$i] = chr(ord('z') - ( ord('a') - ($ord_i - $desp))+1);
                    } else {
                        $str[$i] = chr($ord_i - $desp);
                    }
                }
            }
        }
        return $str;
    }

    $cifrado = codificar($str,$desp);
    $descifrado = decodificar($cifrado,$desp);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>336codificar</title>
</head>
<body>
    <p>Cadena original: <?= $str ?></p>
    <p>Cadena cifrada: <?= $cifrado ?></p>
    <p>Cadena descifrada: <?= $descifrado ?></p>
</body>
</html>