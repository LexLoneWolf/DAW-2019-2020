<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\TiendaService;

if (!isset($_GET['id'])) {
    echo "Seleccione una tienda";
} else {
    session_start();
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $conexion = null;
    $tienda = null;

    try {
        $servicio = new TiendaService();
        $tienda = $servicio->cargarTienda($id);
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al intentar recuperar la tienda";
    }

    $_SESSION['tienda'] = $tienda;
    
    include "formEditarTienda.php";
    
}
