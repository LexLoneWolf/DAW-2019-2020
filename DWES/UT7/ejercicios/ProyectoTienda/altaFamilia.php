<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\FamiliaService;


$nombre = $_POST["nombre"] ?? "";
$cod = $_POST['cod'];
$nombreErr = $codErr = "";

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

    if (empty($_POST["cod"])) {
        $codErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^[A-Z]*$/"));
        if (!filter_var($cod, FILTER_VALIDATE_REGEXP, $opciones)) {
            $codErr = "Sólo se permiten letras en mayúsculas";
            $ok = false;
        }
    }
}

if ($ok) {
    $mensaje = null;

    try {
        $servicio = new FamiliaService();
        $servicio->altaFamilia($cod, $nombre);
        $mensaje = "La familia $nombre se ha insertado con éxito";
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al crear la familia $nombre";
    }

    echo $mensaje;

    include "listarFamilias.php";
} else {
    include "formAltaFamilia.php";
}
