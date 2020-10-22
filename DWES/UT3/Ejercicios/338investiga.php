<?php 

    /* 

    ucwords( string $str [, string $delimiters = " \t\r\n\f\v" ] ): Convierte a mayúsculas
    el primer carácter de cada palabra de una cadena con la opción de elegir el delimitador.

    strrev( string $string ): devuelve la cadena invertida.
    
    str_repeat( string $input , int $multiplier ): Repite un string tantas veces 
    como se defina con el parámetro de tipo entero $multiplier.

    md5( string $str [, bool $raw_output = FALSE ] ): Devuelve el hash(código cifrado) en número hexadecimal de 
    32 carácteres al aplicar el algoritmo de cifrado MD5, con la opción de devolverlo en formato binario de 16 dígitos
    mediante el parámetro raw_output.

    */

    $ucWords = ucwords("hola mundo");
    $strRev = strrev("hola mundo");
    $strRepeat = str_repeat("hola mundo ", 3);
    $md5 = md5("hola mundo");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>338Investiga</title>
</head>
<body>
    <p>ucwords(): <?= $ucWords ?></p>
    <p>strrev(): <?= $strRev ?></p>
    <p>str_repeat(): <?= $strRepeat ?></p>
    <p>md5(): <?= $md5 ?></p>
</body>
</html>
