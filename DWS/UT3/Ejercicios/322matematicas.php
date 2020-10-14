<?php 

    $n = $_GET["n"];

    // Devuelve cantidad de dígitos
    function digitos(int $num): int {
        $cant = 0;
        while (intval($num) > 0) {
            $num /= 10;
            $cant++;
        }
        return $cant;
    }

    function digitosN(int $num, int $pos): int {
        $digito = 0;

        return $digito;
    }

    echo digitos($n);

?>