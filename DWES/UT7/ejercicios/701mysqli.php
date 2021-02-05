<?php 

$conexion = mysqli_connect('localhost', 'dwes', 'abc123.', 'dwes');

$error = $conexion->connect_errno;

if ($error == null) {
    $resultado = $conexion->query('SELECT nombre FROM tienda');
    
    while($tiendas = $resultado->fetch_object()) {
        echo "<p>Tienda: $tiendas->nombre</p>"; 
    }
}

$conexion->close();

