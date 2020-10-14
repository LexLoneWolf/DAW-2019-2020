<?php 

// 1€ = 166,386 pesetas

// Pesetas a euros
function pesetas2euros(int $cantidad , float $cotizacion = 166.386): float {

    return $cantidad / $cotizacion;
}

// euros a pesetas
function euros2pesetas(float $cantidad , float $cotizacion = 166.386): float {

    return $cantidad * $cotizacion;
}

?>