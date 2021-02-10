<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Services\FamiliaService;

$nombre = $_POST["nombre"] ?? "";
$nombreCorto = $_POST['nombreCorto'] ?? "";
$descripcion = $_POST['descripcion'] ?? "";
$pvp = $_POST['pvp'] ?? 0;
$familia = $_POST['familia'] ?? "";

$nombreErr = $nombreErr ?? "";
$nombreCortoErr = $nombreCortoErr ?? "";
$descripcionErr = $descripcionErr ?? "";
$pvpErr = $pvpErr ?? "";

$producto = $_SESSION['producto'];

if (!isset($familias)) {

    try {
        $servicio = new FamiliaService();
        $familias = $servicio->listarFamilias();
    } catch (TiendaException $e) {
        $mensaje = "Ha ocurrido un error al recuperar las familias";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error{color:#FF0000}</style>
    <title>Modificar Producto</title>
</head>
<body>
    <h2>Modificar Producto: <?= $producto->nombre ?></h2>
    <form action="modificarProducto.php" method="POST">

        <label for="familia">Familia: </label>
        <select name="familia" id="familia">
            <?php
            foreach ($familias as $familia) { ?>
              <option value="<?= $familia['cod'] ?>"><?= $familia['cod'] ?></option>
            <?php } ?>
        </select><br />

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" placeholder="Nuevo nombre" value="<?= $nombre ?>" />
        <span class="error"><?= $nombreErr ?></span><br />

        <label for="nombreCorto">Nombre corto: </label>
        <input type="text" name="nombreCorto" placeholder="Nuevo nombre corto" value="<?= $nombreCorto ?>" />
        <span class="error">* <?= $nombreCortoErr ?></span><br />

        <label for="descripcion">Descripción: </label>
        <input type="text" name="descripcion" placeholder="Nueva descripcion" value="<?= $descripcion ?>" />
        <span class="error">* <?= $descripcionErr ?></span><br />

        <label for="pvp">PVP: </label>
        <input type="number" name="pvp" step="0.01" value="<?= $pvp ?>" />
        <span class="error">* <?= $pvpErr ?></span><br />

        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>