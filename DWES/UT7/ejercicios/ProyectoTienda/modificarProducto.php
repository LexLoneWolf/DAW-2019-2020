<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\ProductoService;

session_start();

$producto = $_SESSION['producto'];

$cod = $producto->cod;
$nombre = $_POST["nombre"] ?? "";
$nombreCorto = $_POST['nombreCorto'] ?? "";
$descripcion = $_POST['descripcion'] ?? "";
$pvp = $_POST['pvp'] ?? 0;
$familia = $_POST['familia'] ?? "";

$nombreErr = $codErr = $nombreCortoErr =
$descripcionErr  = $pvpErr = "";
$obligatorio = "Campo obligatorio";
$ok = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ok = true;
    if (!empty($_POST["nombre"])) {
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
            $nombreCortoErr = "Nombre corto no válido";
            $ok = false;
        }
    }

    if (empty($_POST["descripcion"])) {
        $descripcionErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^[a-zA-Z0-9áéíóú\s]*$/"));
        if (!filter_var($descripcion, FILTER_VALIDATE_REGEXP, $opciones)) {
            $descripcionErr = "Descripción no válida";
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
    $producto = null;
    
    try {
        $servicio = new ProductoService();
        $servicio->modificarProducto($cod, $nombre, $nombreCorto, $descripcion, $pvp, $familia);
        $mensaje = "Producto: $cod modificado con éxito";
    } catch (TiendaException $e) {
        echo $e->getMessage();
        $mensaje = "Ha ocurrido un error al modificar el producto";   
    }

    echo $mensaje;
    include "listarProductos.php";
} else {
    include "formEditarProducto.php";
}