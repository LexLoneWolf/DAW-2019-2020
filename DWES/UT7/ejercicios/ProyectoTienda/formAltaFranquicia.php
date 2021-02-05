<?php 

if (!isset($tlf) && !isset($nombre) && !isset($cantTiendas)) {
    $nombre = $tlf = "";
    $cantTiendas = 0;
}

if (!isset($nombreErr) ) {
    $nombreErr = "";
}

if (!isset($tlfErr)) {
    $tlfErr = "";
}

if (!isset($cantTiendasErr)) {
    $cantTiendasErr = ""; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error{color:#FF0000}</style>
    <title>Alta Franquicia</title>
</head>
<body>
    <form action="altaFranquicia.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?= $nombre ?>" />
        <span class="error">* <?= $nombreErr ?></span><br />

        <label for="tlf">Teléfono: </label>
        <input type="text" name="tlf" value="<?= $tlf ?>" />
        <span class="error"><?= $tlfErr ?></span><br />

        <label for="cantTiendas">Número de tiendas: </label>
        <input type="number" name="cantTiendas" value="<?= $cantTiendas ?>" />
        <span class="error"><?= $cantTiendasErr ?></span><br />
        
        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>