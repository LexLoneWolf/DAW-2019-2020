<?php 

namespace Dwes\Tienda;

include "../../../config/configuracion.php";

use PDO;
use Dwes\Tienda\LogFactory;

$nombre = $_POST["nombre"] ?? "";
$tlf = $_POST["tlf"] ?? "";
$nombreErr = $tlfErr = "";
$log = Logfactory::getLogger(CANAL);

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

    if (empty($_POST["tlf"])) {
        $tlfErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^(6|7)[0-9]{8}$/"));
        if (!filter_var($tlf, FILTER_VALIDATE_REGEXP, $opciones)) {
            $tlfErr = "Teléfono no válido";
            $ok = false;
        }
    }
}

if ($ok) {
    // $conexion = null;

    // // 1.- Abrimos la conexión
    // try {
    //     $conexion = new PDO(DSN, USUARIO, PASSWORD);
    //     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     $sql = "INSERT INTO tienda(nombre,tlf) VALUES (:nombre, :tlf);";

    //     $sentencia = $conexion->prepare($sql);
    //     $sentencia->bindParam(":nombre", $nombre);
    //     $sentencia->bindParam(":tlf", $tlf);
    //     $isOk = $sentencia->execute();
    //     $id = $conexion->lastInsertId();
    // } catch (PDOException $e){
    //     throw new TiendaException($e->getMessage());
    // }

    // // 3.- Liberamos la conexión
    // $conexion = null;
    echo "OK";
    $log->info("FUNCIONA");
} else {
    include "formAltaTienda.php";
}
