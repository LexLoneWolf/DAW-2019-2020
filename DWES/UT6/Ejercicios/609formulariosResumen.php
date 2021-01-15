<?php 

session_start();

$nombre = $_SESSION['nombre'];
$apellidos = $_SESSION['apellidos'];
$genero = $_SESSION['genero'];
$email = $_SESSION['email'];
$url = $_SESSION['url'];
$convivientes = $_SESSION['convivientes'];
$aficiones = $_SESSION['aficiones'];
$menu = $_SESSION['menu'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>609formulariosResumen</title>
</head>
<body>
    <table border="10">
        <tr>
            <th>Nombre</th>
            <td><?php echo $nombre . " " . $apellidos; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <th>Página personal</th>
            <td><?= $url ?></td>
        </tr>
        <tr>
            <th>Género</th>
            <td><?= $genero ?></td>
        </tr>
        <tr>
            <th>Número de convivientes</th>
            <td><?= $convivientes ?></td>
        </tr>
        <?php if(!empty($aficiones)) { ?>
        <tr>
            <th>Aficiones</th>
            <td>
                <ul>
                    <?php
                    foreach($aficiones as $aficion) { ?>
                        <li><?= $aficion ?></li>
                    <?php  } ?>
                </ul>
            </td>
        </tr>
        <?php }
        if (!empty($menu)) { ?>
        <tr>
            <th>Platos favoritos</th>
            <td>
                <ul>
                    <?php 
                    foreach ($menu as $plato) { ?>
                        <li><?= $plato ?></li>
                    <?php } ?>
                </ul>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>