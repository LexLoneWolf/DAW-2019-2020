<?php 
session_start();
$sesionColor = $_SESSION['color'];
echo $sesionColor;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>body {background-color: <?= $sesionColor ?>; color:#FFF;} :link, :visited{color:#FFF}</style>
    <title>609fondoSesion2</title>
</head>
<body>
    <p><a href="608fondoSesion1.php">Sesión 1</a></p>
</body>
</html>