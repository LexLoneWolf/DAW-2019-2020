<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\ProductoService;

$cod = $_POST['cod'] ?? "";
$nombre = $_POST["nombre"] ?? "";
$nombreCorto = $_POST['nombreCorto'] ?? "";
$descripcion = $_POST['descripcion'] ?? "";
$pvp = $_POST['pvp'] ?? 0;
$familia = $_POST['familia'] ?? "";

$nombreErr = $codErr = $nombreCortoErr =
$descripcionErr = $descripcionErr =
$pvpErr = "";
$obligatorio = "Campo obligatorio";
$ok = false;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ok = true;

    if (empty($_POST["cod"])) {
        $codErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^[A-Za-z0-9]*$/"));
        if (!filter_var($cod, FILTER_VALIDATE_REGEXP, $opciones)) {
            $codErr = "Sólo se permiten letras en mayúsculas y números";
            $ok = false;
        }
    }

    if (!empty($_POST["nombre"]))  {
        $opciones = array("options" => array("regexp" => "/^[a-zA-Z0-9áéíóú\s]*$/"));
        if (!filter_var($nombre, FILTER_VALIDATE_REGEXP, $opciones)) {
            $nombreErr = "Nombre no válido";
            $ok = false;
        }
    }

    if (empty($_POST["nombreCorto"])) {
        $nombreCortoErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^[a-zA-Z0-9áéíóú\s]*$/"));
        if (!filter_var($nombreCorto, FILTER_VALIDATE_REGEXP, $opciones)) {
            $nombreCortoErr = "Sólo se permiten letras y espacios en blanco";
            $ok = false;
        }
    }

    if (empty($_POST["descripcion"])) {
        $descripcionErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^[a-zA-Z0-9áéíóú\s]*$/"));
        if (!filter_var($descripcion, FILTER_VALIDATE_REGEXP, $opciones)) {
            $descripcionErr = "Sólo se permiten letras y espacios en blanco";
            $ok = false;
        }
    }

    if (empty($_POST["pvp"])) {
        $pvpErr = $obligatorio;
        $ok = false;
    } else {
        if (!filter_var($pvp, FILTER_VALIDATE_FLOAT)) {
            $pvpErr = "Número no válido";
            $ok = false;
        }
    }
}

if ($ok) {
    $mensaje = null;
    try {
        $servicio = new ProductoService();
        $servicio->altaProducto($cod, $nombre, $nombreCorto, $descripcion, $pvp, $familia);
        $mensaje = "El producto $nombre se ha insertado con éxito";
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al insertar el producto $nombre";
    }

    echo $mensaje;

    include "listarProductos.php";
} else {
    include "formAltaProducto.php";
}