<?php 

    include_once("323euros.php");

    $productos = [];
    for ($i=0; $i < $_GET["cantidad"]; $i++) { 
        $productos[] = array(
            'descripcion' => $_GET["descripcion$i"],
            'precio' => $_GET["precio$i"]
        );
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>324imprimeTiquetCompra</title>
</head>
<body>
    <table border="1">

        <tr>
            <th>Producto</th>
            <th>Descripción</th>
            <th colspan="2">Precio</th>
        </tr>

        <?php
        foreach ($productos as $producto => $valor) { ?>
            
            <tr>
                <td>Producto <?= $producto ?></td>
                <td><?= $valor['descripcion'] ?></td>
                <td><?php echo $valor['precio'] . "€" ?></td>
                <td><?php echo euros2Pesetas($valor['precio']) . "pts"; ?></td>
            </tr>
            
        <?php } ?>

    
    </table>
</body>
</html>