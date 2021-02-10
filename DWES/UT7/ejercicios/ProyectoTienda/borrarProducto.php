<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\ProductoService;

$cod = $_GET["cod"] ?? "";

if (!isset($_GET['cod'])) {
    echo "Seleccione un producto";
} else {

    $mensaje = null;
    
    try {
        $servicio = new ProductoService();
        $servicio->eliminarProducto($cod);
        $mensaje = "Producto $cod eliminado con éxito";
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al borrar el producto $cod";
    }

    echo $mensaje;
    include "listarProductos.php";
}
