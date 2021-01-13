<?php 

session_start();
$color = $_POST["color"] ?? "#333";
$_SESSION['color'] = $color;

if (isset($POST['Seleccionar'])) {
    $_SESSION['color'] = $color;
} else {
    if (isset($_SESSION['color'])) {
        $sesionColor = $_SESSION['color'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>body {background-color: <?= $sesionColor ?>; color:#FFF;} :link, :visited{color:#FFF}</style>
    <title>607fondoSesion1</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="color">Selecciona un color</label>
        <input type="color" name="color" />   
        <input type="submit" value="Seleccionar" />
    </form>

    <p><a href="608fondoSesion2.php">Sesión 2</a></p>
</body>
</html>