<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\ProductoService;

if (!isset($_GET['cod'])) {
    echo "Seleccione un producto";
} else {
    session_start();
    $cod = $_GET['cod'];
    $producto = null;

    try {
        $servicio = new ProductoService();
        $producto = $servicio->cargarProducto($cod);
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al intentar recuperar el producto";
    }

    $_SESSION['producto'] = $producto;
    
    include "formEditarProducto.php";  
}