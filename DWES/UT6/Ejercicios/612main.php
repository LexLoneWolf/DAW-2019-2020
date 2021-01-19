<?php
// Recuperamos la información de la sesión
if(!isset($_SESSION)) {
    session_start();
}
// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='610index.php'>identificarse</a>.<br />");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de XXXX</title>
</head>
<body>
    <h1>Bienvenido <?= $_SESSION['usuario'] ?></h1>
    <p>Pulse <a href="613logout.php">aquí</a> para salir</p>
    <p>Volver al <a href="611login.php">inicio</a></p>
    <h2>Listado de XXXX</h2>
</body>
</html>
