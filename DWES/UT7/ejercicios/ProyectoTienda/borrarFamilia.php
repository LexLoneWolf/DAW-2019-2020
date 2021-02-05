<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\FamiliaService;

$cod = $_GET["cod"] ?? "";

if (!isset($_GET['cod'])) {
    echo "Seleccione una familia";
} else {

    $mensaje = null;
    
    try {
        $servicio = new FamiliaService();
        $servicio->eliminarFamilia($cod);
        $mensaje = "Familia $cod eliminada con éxito";
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al borrar la familia $cod";
    }

    echo $mensaje;
    include "listarFamilias.php";
}
