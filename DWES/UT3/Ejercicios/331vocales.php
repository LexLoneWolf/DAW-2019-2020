<?php 

    $str = $_GET["str"];

    // Función que devuelve la cantidad de cada una de las vocales de una frase y el total de ellas.
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

    $vocales = vocales($str);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>331vocales</title>
</head>
<body>
<p>VOCALES</p>
    
    <p>La frase: <?= $str ?> contiene un total de <?= $vocales['t'] ?>  vocales</p>
    <ul>
        <?php   foreach ($vocales as $vocal => $value) { 
            if ($vocal != 't') { ?>
                <li>La vocal <?= $vocal ?> aparece <?= $value ?> veces</li> 
            <?php }
        } ?>
    </ul>
</body>
</html>