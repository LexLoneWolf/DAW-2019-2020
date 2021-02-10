<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Tiendas</title>
</head>
<body>
    <h1>Listado de tiendas</h1>

    <table border="10">
        <tr>
            <th>COD</th>
            <th>NOMBRE</th>
            <th>TELÉFONO</th>
            <th colspan="2">OPCIONES</th>
        </tr>

        <?php foreach ($tiendas as $tienda) { ?>
            <tr>
                <td><?= $tienda['cod'] ?></td>
                <td><?= $tienda['nombre'] ?></td>
                <td><?= $tienda['tlf'] ?></td>
                <td><a href="cargarTienda.php?id=<?= $tienda['cod'] ?>"><button>Modificar</button></a></td>
                <td><a href="borrarTienda.php?id=<?= $tienda['cod'] ?>"><button>Eliminar</button></a></td>  
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