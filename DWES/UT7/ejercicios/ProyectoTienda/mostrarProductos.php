<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar productos</title>
</head>
<body>
    <h1>Listado de productos</h1>

    <table border="10">
        <tr>
            <th>COD</th>
            <th>NOMBRE</th>
            <th>NOMBRE CORTO</th>
            <th>DESCRIPCIÓN</th>
            <th>PVP</th>
            <th>FAMILIA</th>
            <th colspan="2">OPCIONES</th>
        </tr>

        <?php foreach ($productos as $producto) { ?>
            <tr>
                <td><?= $producto['cod'] ?></td>
                <td><?= $producto['nombre'] ?></td>
                <td><?= $producto['nombre_corto'] ?></td>
                <td><?= $producto['descripcion'] ?></td>
                <td><?= $producto['PVP'] ?></td>
                <td><?= $producto['nomFamilia'] ?></td>
                <td><a href="cargarProducto.php?cod=<?= $producto['cod'] ?>"><button>Modificar</button></a></td>
                <td><a href="borrarProducto.php?cod=<?= $producto['cod'] ?>"><button>Eliminar</button></a></td>  
            </tr>
        <?php } ?>
    </table>
    <br />
    <a href="formAltaTienda.php"><button>Nueva Tienda</button></a>
    <a href="formAltaFranquicia.php"><button>Nueva Franquicia</button></a>
    <a href="formAltaFamilia.php"><button>Nueva Familia</button></a>
    <a href="formAltaProducto.php"><button>Nuevo Producto</button></a>
</body>
</html>