<?php 

if (!isset($tlf) && !isset($nombre)) {
    $nombre = $tlf = "";
}

if (!isset($nombreErr) ) {
    $nombreErr = "";
}

if (!isset($tlfErr)) {
    $tlfErr = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error{color:#FF0000}</style>
    <title>Modificar Tienda</title>
</head>
<body>
    <h2>Modificar Tienda <?= $_SESSION['tienda']->cod ?>: <?= $_SESSION['tienda']->nombre ?></h2>
    <form action="modificarTienda.php" method="POST">
        <label for="nombre">Nombre de la tienda: </label>
        <input type="text" name="nombre" placeholder="Nuevo nombre" value="<?= $nombre ?>" />
        <span class="error">* <?= $nombreErr ?></span><br />

        <label for="tlf">Teléfono: </label>
        <input type="text" name="tlf" placeholder="Nuevo teléfono" value="<?= $tlf ?>" />
        <span class="error"><?= $tlfErr ?></span><br /><br />

        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>