<?php 

    $numeros = $_GET["numeros"];
    function obtenerPares(string $numeros): array { 

        $numeros = explode(" ", $numeros);
        $arrayPares = [
            'pares' => array(),
            'cantPares' => 0
        ];
        $tam = count($numeros);
        $cantPares = 0;
        for ($i=0; $i < $tam; $i++) {
            if ($numeros[$i] % 2 == 0) {
                $cantPares++;
                $arrayPares['pares'][$i] = $numeros[$i];
            }
        }
        $arrayPares['pares'] = implode(" ", $arrayPares['pares']);
        $arrayPares['cantPares'] = $cantPares;

        return $arrayPares;
    }

    $pares = obtenerPares($numeros);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>337filtrado</title>
</head>
<body>
    <p>Los <?= $pares['cantPares'] ?> números pares son: <?= $pares['pares'] ?></p>
</body>
</html>