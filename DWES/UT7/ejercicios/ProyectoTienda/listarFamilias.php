<?php 

include_once "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\FamiliaService;

$familias = [];
$mensaje = null;

try {
    $servicio = new FamiliaService();
    $familias = $servicio->listarFamilias();
} catch (TiendaException $e){
    $mensaje = "Ha ocurrido un error al recuperar las familias";
}

include "mostrarFamilias.php";
