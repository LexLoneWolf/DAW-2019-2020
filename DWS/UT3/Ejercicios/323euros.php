<?php 

// 1€ = 166,386 pesetas

// pesetas a euros

//$n = $_GET["n"];

function pesetas2euros(int $cantidad , float $cotizacion = 166.386): float {

    return $cantidad / $cotizacion;
}


//echo "$n" . "pesetas son " . pesetas2euros($n) . "€<br />";

// euros a pesetas
function euros2pesetas(float $cantidad , float $cotizacion = 166.386): float {

    return $cantidad * $cotizacion;
}

//echo "$n" . "€ son " . euros2pesetas($n) . " pts";

?>