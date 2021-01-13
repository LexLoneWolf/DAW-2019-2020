<?php 

$accesosPagina = 0;
$mensaje = "Bienvenido";
$reset = $_POST["Reset"] ?? "";

if (isset($_POST["Reset"])) {
    setcookie('accesos', "", 1);
} else {
    if (isset($_COOKIE['accesos'])) {
        $accesosPagina = $_COOKIE['accesos'];
        $mensaje = "Hola de nuevo";
    }
}

setcookie('accesos', ++$accesosPagina);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>606contadorVisitas</title>
</head>
<body>
    <p>Contador accesos: <?= $accesosPagina ?></p>
    <p><?= $mensaje ?></p>
    <form action="606contadorVisitas.php" method="POST">
        <input type="submit" name="Reset" value="Reset" />
    </form>
</body>
</html>