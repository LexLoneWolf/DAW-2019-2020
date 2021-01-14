<?php 

session_start();

if (isset($_SESSION['color'])) {
    $sesionColor = $_SESSION['color'];
    if (isset($_POST['Seleccionar'])) {
        $_SESSION['color'] = $_POST['color'];
    }
} else {
    if (isset($_POST['Seleccionar'])) {
        $_SESSION['color'] = $_POST['color'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>body {background-color: <?= $sesionColor ?>; }</style>
    <title>607fondoSesion1</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="color">Selecciona un color</label>
        <input type="color" name="color" />   
        <input type="submit" name="Seleccionar" value="Seleccionar" />
    </form>

    <p><a href="608fondoSesion2.php"><button>Sesión 2</button></a></p>
</body>
</html>