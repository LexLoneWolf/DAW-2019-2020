<?php 
    $str = $_GET["str"];

    // Función que dice si una palabra es palíndroma
    function palindromo(string $str): bool {
        $palindromo = false;
        if (strrev($str) == $str) {
            $palindromo = true;
        } else {
            $palindromo = false;
        }
        return $palindromo;
    }
    $palindromo = palindromo($str);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>334palindromo</title>
</head>
<body>
    <p>PALINDROMO</p>

    <?php 

    if (!$palindromo) {  ?> 
        <p><?php echo "$str no es palíndromo"; ?></p>
    <?php
    } else { ?>
        <p><?php echo "$str es palíndromo"; ?></p>
    <?php } ?>    
</body>
</html>