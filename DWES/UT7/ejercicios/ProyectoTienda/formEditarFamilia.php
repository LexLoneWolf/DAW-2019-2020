<?php 

if (!isset($nombre)) {
    $nombre = "";
}

if (!isset($nombreErr) ) {
    $nombreErr = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error{color:#FF0000}</style>
    <title>Modificar Familia</title>
</head>
<body>
    <h2>Modificar Familia <?= $_SESSION['familia']->cod ?>: <?= $_SESSION['familia']->nombre ?></h2>
    <form action="modificarFamilia.php" method="POST">
        <label for="cod">Código: </label>
        <input type="text" name="cod" value="<?= $_SESSION['familia']->cod ?>" readonly /><br />

        <label for="nombre">Nombre de la familia: </label>
        <input type="text" name="nombre" placeholder="Nuevo nombre" value="<?= $nombre ?>" />
        <span class="error">* <?= $nombreErr ?></span><br />

        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>