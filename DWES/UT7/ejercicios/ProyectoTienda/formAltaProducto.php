<?php 

include "vendor/autoload.php";

use Dwes\Tienda\Services\FamiliaService;
use Dwes\Tienda\Util\TiendaException;

$cod = $cod ?? "";
$nombre = $nombre ?? "";
$nombreCorto = $nombreCorto ?? "";
$descripcion = $descripcion ?? "";
$pvp = $pvp ?? 0;
$familia = $familia ?? "";

$nombreErr = $nombreErr ?? "";
$codErr = $codErr ?? "";
$nombreCortoErr = $nombreCortoErr ?? "";
$descripcionErr = $descripcionErr ?? "";
$pvpErr = $pvpErr ?? "";



if (!isset($familias)) {

    try {
        $servicio = new FamiliaService();
        $familias = $servicio->listarFamilias();
    } catch (TiendaException $e) {
        echo $e->getMessage();
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
    <title>Alta Producto</title>
</head>
<body>
    <form action="altaProducto.php" method="POST">

        <label for="familia">Familia: </label>
        <select name="familia" id="familia">
            <?php
            foreach ($familias as $familia) { ?>
              <option value="<?= $familia['cod'] ?>"><?= $familia['cod'] ?></option>
            <?php } ?>
        </select><br />

        <label for="cod">Código: </label>
        <input type="text" name="cod" value="<?= $cod ?>" />
        <span class="error">* <?= $codErr ?></span><br />

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?= $nombre ?>" />
        <span class="error"><?= $nombreErr ?></span><br />

        <label for="nombreCorto">Nombre corto: </label>
        <input type="text" name="nombreCorto" value="<?= $nombreCorto ?>" />
        <span class="error">* <?= $nombreCortoErr ?></span><br />

        <label for="descripcion">Descripcion: </label>
        <input type="text" name="descripcion" value="<?= $descripcion ?>" />
        <span class="error">* <?= $descripcionErr ?></span><br />

        <label for="pvp">PVP: </label>
        <input type="number" name="pvp" value="<?= $pvp ?>" step="0.01" />
        <span class="error">* <?= $pvpErr ?></span><br />
        
        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>
