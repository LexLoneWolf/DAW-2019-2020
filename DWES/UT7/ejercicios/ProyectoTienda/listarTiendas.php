<?php 

include_once "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\TiendaService;

$tiendas = [];
$mensaje = null;

try {
    $servicio = new TiendaService();
    $tiendas = $servicio->listarTiendas();
} catch (TiendaException $e){
    $mensaje = "Ha ocurrido un error al recuperar las tiendas";
}

include "mostrarTiendas.php";
