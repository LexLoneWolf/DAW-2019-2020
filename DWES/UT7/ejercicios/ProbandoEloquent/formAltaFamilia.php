<?php 

$nombre = $nombre ?? "";
$cod = $cod ?? "";

$nombreErr = $nombreErr ?? "";
$codErr = $codErr ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error{color:#FF0000}</style>
    <title>Alta Familia</title>
</head>
<body>
    <form action="altaFamilia.php" method="POST">

        <label for="cod">Código: </label>
        <input type="text" name="cod" value="<?= $cod ?>" />
        <span class="error">* <?= $codErr ?></span><br />

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?= $nombre ?>" />
        <span class="error">* <?= $nombreErr ?></span><br />
        
        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>