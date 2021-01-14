<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error {color: #FF0000}</style>
    <title>609formularios1</title>
</head>
<body>
<?php 

session_start();
$nombre = $_POST['nombre'] ?? "";
$apellidos = $_POST['apellidos'] ?? "";
$nombreErr = $apellidosErr =  "";
$obligatorio = "Campo obligatorio";
$ok = false;

$_SESSION['nombre'] = $nombre;
$_SESSION['apellidos'] = $apellidos;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ok = true;
    if (empty($_POST["nombre"])) {
        $nombreErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^[a-zA-Záéíóú\s]*$/"));
        if (!filter_var($nombre, FILTER_VALIDATE_REGEXP, $opciones)) {
            $nombreErr = "Sólo se permiten letras y espacios en blanco";
            $ok = false;
        }
    }

    if (empty($_POST["apellidos"])) {
        $apellidosErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("regexp" => "/^[a-zA-Záéíóú\s]*$/"));
        if (!filter_var($apellidos, FILTER_VALIDATE_REGEXP, $opciones)) {
            $apellidosErr = "Sólo se permiten letras y espacios en blanco";
            $ok = false;
        }
    }
}

if ($ok) {
   header("Location: 609formularios2.php");
   exit();
}

?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="nombre" value="<?= $nombre ?>" required="true" />
    <span class="error">* <?= $nombreErr ?></span><br />

    <label for="apellidos">Apellidos: </label>
    <input type="text" id="apellidos" name="apellidos" value="<?= $apellidos ?>" required="true" />
    <span class="error">* <?= $apellidosErr ?></span><br />

    <input type="submit" value="Siguiente" />
</form>
</body>
</html>
