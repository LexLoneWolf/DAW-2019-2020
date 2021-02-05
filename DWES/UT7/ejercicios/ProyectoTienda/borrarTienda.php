<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\TiendaService;

$id = $_GET["id"] ?? "";

if (!isset($_GET['id'])) {
    echo "Seleccione una tienda";
} else {

    $mensaje = null;
    
    try {
        $servicio = new TiendaService();
        $servicio->eliminarTienda($id);
        $mensaje = "Tienda $id eliminada con éxito";
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al borrar la tienda $id";
    }

    echo $mensaje;
    include "listarTiendas.php";
}
