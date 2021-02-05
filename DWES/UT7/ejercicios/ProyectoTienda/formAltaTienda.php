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
    <title>Alta Tienda</title>
</head>
<body>
    <form action="altaTienda.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?= $nombre ?>" />
        <span class="error">* <?= $nombreErr ?></span><br />

        <label for="tlf">Teléfono: </label>
        <input type="text" name="tlf" value="<?= $tlf ?>" />
        <span class="error"><?= $tlfErr ?></span><br />
        
        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>