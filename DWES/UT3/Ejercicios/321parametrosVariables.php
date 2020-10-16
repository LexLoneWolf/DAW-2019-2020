<?php 
    // Devuelve el mayor número de los parámetros introducidos.
    function mayor(): int {
        
        if (func_num_args() == 0) {
            return false;
        } else {
            $mayor = 0;
            for ($i=0; $i < func_num_args(); $i++) { 
                if ($mayor < func_get_arg($i)) {
                    $mayor = func_get_arg($i);
                }
            }
            return $mayor;
        }    
    }
    // Concatena los parámentros introducidos
    function concatenar(): string {
       
        if (func_num_args() == 0) {
            return false;
        } else {
            $str = "";
            for ($i=0; $i < func_num_args(); $i++) { 
                $str.= func_get_arg($i);
            }
            return $str;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>321parametrosVariables</title>
</head>
<body>

    <p><?= mayor(0,2,8,14,99) ?></p>

    <p><?= concatenar("H","o","l","a"," M","u","n","d","o.") ?></p>

</body>
</html>