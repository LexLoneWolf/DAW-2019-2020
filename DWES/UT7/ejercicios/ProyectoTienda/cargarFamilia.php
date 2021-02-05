<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\FamiliaService;

if (!isset($_GET['cod'])) {
    echo "Seleccione una tienda";
} else {
    session_start();
    $cod = $_GET['cod'];
    $conexion = null;
    $familia = null;

    try {
        $servicio = new FamiliaService();
        $familia = $servicio->cargarFamilia($cod);
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al intentar recuperar la familia";
    }

    $_SESSION['familia'] = $familia;
    
    include "formEditarFamilia.php";  
}
