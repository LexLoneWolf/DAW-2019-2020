<?php 
    include_once("encabezado.php");
    $cantidad = $_GET["cantidad"];
?>

<form action="326listaCompra.php" method="GET">
        
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

<?php
    include_once("pie.php");
?>