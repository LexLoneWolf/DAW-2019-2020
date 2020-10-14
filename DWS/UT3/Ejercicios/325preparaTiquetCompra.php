<?php 
    $cantidad = $_GET["cantidad"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>324preparaTiquetCompra</title>
</head>
<body>
    <form action="325imprimeTiquetCompra.php" method="GET">
        
        <?php 
        for ($i=0; $i < $cantidad; $i++) { ?>
            <fieldset>
            <legend>Producto <?= $i ?></legend>
            <label for="descripcion<?= $i ?>">Descripción</label>
            <input type="text" name="descripcion<?= $i ?>" id="descripcion<?= $i ?>" />
            <label for="precio<?= $i ?>">Precio €</label>
            <input type="number<?= $i ?>" name="precio<?= $i ?>" id="precio<?= $i ?>" />
            </fieldset>
        <?php } ?>
        <input type="hidden" name="cantidad" value="<?= $cantidad ?>" /><br />
        <input type="submit" value="Enviar" />
    </form>
</body>
</html>