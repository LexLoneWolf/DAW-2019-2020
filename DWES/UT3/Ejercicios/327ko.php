
<?php 
    include("327login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>327ko</title>
</head>
<body>

    <p>
    <?php 
    if ($ko == 0) { ?>
        Usuario <?= $_GET["usuario"] ?> incorrecto
    <?php } else { ?>
        Contraseña incorrecta
    <?php } ?>
    </p>
</body>
</html>