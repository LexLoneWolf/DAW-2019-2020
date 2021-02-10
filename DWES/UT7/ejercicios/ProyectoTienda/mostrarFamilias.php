<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar familias</title>
</head>
<body>
    <h1>Listado de familias</h1>

    <table border="10">
        <tr>
            <th>COD</th>
            <th>NOMBRE</th>
            <th colspan="2">OPCIONES</th>
        </tr>

        <?php foreach ($familias as $familia) { ?>
            <tr>
                <td><?= $familia['cod'] ?></td>
                <td><?= $familia['nombre'] ?></td>
                <td><a href="cargarFamilia.php?cod=<?= $familia['cod'] ?>"><button>Modificar</button></a></td>
                <td><a href="borrarFamilia.php?cod=<?= $familia['cod'] ?>"><button>Eliminar</button></a></td>  
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