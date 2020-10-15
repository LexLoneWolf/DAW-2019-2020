<?php
    $titulo = "326listaCompra"; 
    include_once("325euros.php");
    include_once("encabezado.php");
    
    $productos = [];
    for ($i=0; $i < $_GET["cantidad"]; $i++) { 
        $productos[] = array(
            'descripcion' => $_GET["descripcion$i"],
            'precio' => $_GET["precio$i"]
        );
    }  
?>

<ul>
    <?php foreach ($productos as $producto => $valor) { ?>
        <li>Producto: <?= $producto ?>, Descripción: <?= $valor['descripcion'] ?>,
            Precio: <?php 
            echo $valor['precio'] . " € | " .
            euros2pesetas($valor['precio']) . " pts | " .
            euros2dolares($valor['precio']) . " $";
            ?>
        </li>
    <?php } ?>
</ul>

<?php 
    include_once("pie.html");
?>