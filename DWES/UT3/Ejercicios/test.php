<?php 

    include("330fraseImpares.php");
    include("331vocales.php");
    include("332analizador.php");
    $str = $_GET["str"];
    $vocales = vocales($str);
    $analizado = analizador($str);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
    <?php 
        
        echo fraseImpares($str) . "<br />";
        echo "La frase: $str contiene un total de " . $vocales['t'] . " vocales<br />";
        foreach ($vocales as $vocal => $value) {
            if ($vocal != 't') {
                echo "La vocal " . $vocal . " aparece " . $value . " veces<br />";
            }
        }
    ?>

    



</body>
</html>