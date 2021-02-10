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
        </tr>

        <?php foreach ($familias as $familia) { ?>
            <tr>
                <td><?= $familia['cod'] ?></td>
                <td><?= $familia['nombre'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <br />
    <a href="formAltaFamilia.php"><button>Nueva Familia</button></a>
</body>
</html>