<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\TiendaService;


$nombre = $_POST["nombre"] ?? "";
$tlf = $_POST["tlf"] ?? "";
$cantTiendas= $_POST['cantTiendas'] ?? 0;
$nombreErr = $tlfErr = $cantTiendasErr = "";

$obligatorio = "Campo obligatorio";
$ok = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ok = true;
    if (empty($_POST["nombre"])) {
        $nombreErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^[a-zA-Záéíóú\s]*$/"));
        if (!filter_var($nombre, FILTER_VALIDATE_REGEXP, $opciones)) {
            $nombreErr = "Sólo se permiten letras y espacios en blanco";
            $ok = false;
        }
    }

    if (isset($_POST["tlf"])) {
        $opciones = array("options" => array("regexp" => "/^(6|7|9)[0-9]{8}$/"));
        if (!filter_var($tlf, FILTER_VALIDATE_REGEXP, $opciones)) {
            $tlfErr = "Teléfono no válido";
            $ok = false;
        }
    }

    if (isset($_POST["cantTiendas"])) {
        if (!filter_var($cantTiendas, FILTER_VALIDATE_INT)) {
            $tlfErr = "Número no válido";
            $ok = false;
        }
    }
}

if ($ok) {
    $mensaje = null;
    try {
        $servicio = new TiendaService();
        $servicio->altaFranquicia($cantTiendas, $nombre, $tlf);
        $mensaje = "La franquicia $nombre se ha insertado con éxito";
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al crear la franquicia $nombre";
    }
    echo $mensaje;
    include "listarTiendas.php";
} else {
    include "formAltaFranquicia.php";
}
