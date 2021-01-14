<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error {color: #FF0000}</style>
    <title>609formularios3</title>
</head>
<body>
    
<?php

session_start();
$convivientes = $_POST["convivientes"] ?? 0;
$aficiones = $_POST["aficiones"] ?? [];
$menu = $_POST["menu"] ?? [];
$convivientesErr = "";
$obligatorio = "Campo obligatorio";
$ok = false;

$_SESSION['convivientes'] = $convivientes;
$_SESSION['aficiones'] = $aficiones;
$_SESSION['menu'] = $menu;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ok = true;
    if (empty($_POST["convivientes"])) {
        $convivientesErr = $obligatorio;
        $ok = false;
    } else {
        $opciones = array("options" => array("min_range" => 1, "max_range" => 10));
        if (!filter_var($convivientes, FILTER_VALIDATE_INT, $opciones)) {
            $convivientesErr = "Valores entre 1 y 10";
            $ok = false;
        }
    }
}

if ($ok) {
    header("Location: 609formulariosResumen.php");
    exit();
}

?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="convivientes">Numero de convivientes en el domicilio</label>
        <input type="number" id="convivientes" name="convivientes" value="<?= $convivientes ?>" required />
        <span class="error">* <?= $convivientesErr ?></span><br />
        
        <label for="aficiones[]">Aficiones</label><br />
        <input type="checkbox" name="aficiones[]" value="videojuegos" <?php if (in_array("videojuegos", $aficiones)) echo "checked"; ?> /> Videojuegos<br />
        <input type="checkbox" name="aficiones[]" value="guitarra" <?php if (in_array("guitarra", $aficiones)) echo "checked"; ?> /> Guitarra<br />
        <input type="checkbox" name="aficiones[]" value="cine" <?php if (in_array("cine", $aficiones)) echo "checked"; ?> /> Cine<br />
        <input type="checkbox" name="aficiones[]" value="programar" <?php if (in_array("programar", $aficiones)) echo "checked"; ?> /> Programar<br />

        <label for="menu[]">Platos favoritos</label><br />
        <select name="menu[]" id="menu" multiple>
        <option value="carbonara" <?php if (in_array("carbonara", $menu)) echo "selected"; ?>>Carbonara</option>
        <option value="croquetas" <?php if (in_array("croquetas", $menu)) echo "selected"; ?>>Croquetas</option>
        <option value="pizza" <?php if (in_array("pizza", $menu)) echo "selected"; ?>>Pizza</option>
        <option value="hamburguesa" <?php if (in_array("hamburguesa", $menu)) echo "selected"; ?>>Hamburguesa</option>
        </select><br/>

        <input type="submit" value="enviar" />
    </form>
</body>
</html>

