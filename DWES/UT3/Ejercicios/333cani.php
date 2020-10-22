<?php 

    $str = $_GET["str"];
    // Función que convierte una cadena a cani
    function cani(string $str): string {

        for ($i=0, $j=0; $i < strlen($str); $i++, $j++) { 
            if (ctype_space($str[$i])) {
                $j++;
            }
            if ($j % 2 == 0) {
                $str[$i] = strtoupper($str[$i]);
            } else {
                $str[$i] = strtolower($str[$i]);
            }
        }
        return $str;
    }

    $cani = cani($str);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>333cani</title>
</head>
<body>
    <p><?= $cani ?></p>
</body>
</html>