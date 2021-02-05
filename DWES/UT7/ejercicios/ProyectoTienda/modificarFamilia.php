<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\FamiliaService;

session_start();
$nombre = $_POST["nombre"] ?? "";
$cod = $_POST['cod'];
$nombreErr =  "";

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
}

if ($ok) {

    $mensaje = null;
    $familia = null;
    
    try {
        $servicio = new FamiliaService();
        $servicio->modificarFamilia($cod, $nombre);
        $mensaje = "Familia: $nombre modificada con éxito";
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al modificar la familia";   
    }

    echo $mensaje;
    include "listarFamilias.php";
} else {
    include "formEditarFamilia.php";
}
