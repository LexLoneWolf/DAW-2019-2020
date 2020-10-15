<?php 

    $n = $_GET["n"];
    $pos = $_GET["pos"];

    // Devuelve cantidad de dígitos
    function digitos(int $num): int {
        $cant = 0;
        while ($num > 0) {
            $num = intval($num / 10);
            $cant++;
        }
        return $cant;
    }

    // Devuelve el valor de la posición indicada en un número.
    function digitosN(int $num, int $pos): int {
        $posiciones = [];
        while ($num > 0) {
            $posiciones[] = $num % 10;
            $num = intval($num/10);
        }
        $posiciones = array_reverse($posiciones);
        return $posiciones[$pos-1];
    }

    // Quita números por detrás según cantidad
    function quitaPorDetras(int $num, int $cant): int {   
        $num /= pow(10, $cant);
        return $num;
    }

    // Quita números por delante según cantidad
    function quitaPorDelante(int $num, int $cant): int {
        $tam = digitos($num);
        $num %= pow(10, $tam-$cant);
        return $num;
    }

    echo digitos($n);

?>