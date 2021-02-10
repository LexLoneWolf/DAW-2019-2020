<?php 

include_once "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\ProductoService;

$productos = [];
$mensaje = null;

try {
    $servicio = new ProductoService();
    $productos = $servicio->listarProductos();
} catch (TiendaException $e){
    $mensaje = "Ha ocurrido un error al recuperar los productos";
}

echo $mensaje;

include "mostrarProductos.php";
