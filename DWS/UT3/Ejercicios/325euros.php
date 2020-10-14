<?php  

// 1€ = 166,386 pesetas
// 1€ = 0.85 dólares
// 1 peseta = 141.104 dólares

// Pesetas a euros
function pesetas2euros(int $cantidad , float $cotizacion = 166.386): float {

    return $cantidad / $cotizacion;
}

// euros a pesetas
function euros2pesetas(float $cantidad , float $cotizacion = 166.386): float {

    return $cantidad * $cotizacion;
}

// Pesetas a dólares
function pesetas2dolares(int $cantidad , float $cotizacion = 141.104): float{

    return $cantidad / $cotizacion;
}

// Euros a dólares
function euros2dolares(float $cantidad, float $cotizacion = 0.85): float {
    
    return $cantidad / $cotizacion;
}

// Dólares a euros
function dolares2euros(float $cantidad, float $cotizacion = 0.85): float {
    
    return $cantidad * $cotizacion;
}

// Dólares a pesetas
function dolares2Pesetas(float $cantidad , float $cotizacion = 141.104): float {

    return $cantidad * $cotizacion;
}

?>