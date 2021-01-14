<?php 
session_start();

if (isset($_SESSION['color'])) {
    $sesionColor = $_SESSION['color'];
}

if (isset($_POST['cerrarSesion'])) {
    session_destroy();
    header("Location: 608fondoSesion1.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>body {background-color: <?= $sesionColor ?>; }</style>
    <title>609fondoSesion2</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="submit" name="cerrarSesion" value="Cerrar Sesión" />
    </form>
    <p><a href="608fondoSesion1.php"><button>Volver</button></a></p>
    
</body>
</html>