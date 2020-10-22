<?php 
    $str = $_GET["str"];

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

    $fraseImpares = fraseImpares($str);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>330fraseImpares</title>
</head>
<body>
    <p>FRASE IMPARES</p>
    <p><?= $str ?></p>
    <p><?= $fraseImpares ?></p>
</body>
</html>