<?php 

$color = $_POST["color"] ?? "#333";
if (isset($POST['Seleccionar'])) {
    setcookie('color', $color, time()+86400);
} else {
    if (isset($_COOKIE['color'])) {
        $cookieColor = $_COOKIE['color'];
    }
}

setcookie('color', $color, time()+86400);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>body {background-color: <?= $cookieColor ?>; color:#FFF;}</style>
    <title>607fondo</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="color">Selecciona un color</label>
        <input type="color" name="color" />   
        <input type="submit" value="Seleccionar" />
    </form>
</body>
</html>