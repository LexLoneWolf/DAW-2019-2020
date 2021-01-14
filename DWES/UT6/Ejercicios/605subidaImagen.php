<?php 

$anchura = $_POST["anchura"] ?? 0;
$altura = $_POST["altura"] ?? 0;
$alturaErr = $anchuraErr = $archivoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (empty($anchura)) {
        $anchuraErr = "Campo obligatorio";
       
    }

    if (empty($altura)) {
        $alturaErr = "Campo obligatorio";
        
    }

    if (isset($altura) && isset($anchura)) {
        if (is_uploaded_file($_FILES['archivoEnviado']['tmp_name'])) {
            if ($_FILES['archivoEnviado']['size'] < 3E+6) {
                if (substr($_FILES['archivoEnviado']['type'], 0, 5) == "image") {
                    $nombre = $_FILES['archivoEnviado']['name'];
                    move_uploaded_file($_FILES['archivoEnviado']['tmp_name'], "./uploads/{$nombre}");
                } else {
                    $archivoErr = "Archivo no soportado";
                }
            } else {
                $archivoErr = "Archivo demasiado grande. Tamaño máximo: 1024 bytes";
            } 
        } else {
            $archivoErr = "No se ha subido ningún archivo";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error {color: #FF0000}</style>
    <title>604subidaImagen</title>
</head>
<body>
    <form enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="anchura">Anchura:</label>
        <input type="number" name="anchura" value="<?= $anchura ?>" required />
        <span class="error">* <?= $anchuraErr ?></span><br />

        <label for="altura">Altura:</label>
        <input type="number" name="altura" value="<?= $altura ?>" required />
        <span class="error">* <?= $alturaErr ?></span><br />

        Archivo: <input type="file" name="archivoEnviado" required />
        <span class="error">* <?= $archivoErr ?></span><br />
        <input type="submit" name="btnSubir" value="Subir" />
        
    </form>

    <?php if (isset($nombre)) { ?>
        <p>Archivo: <?= $nombre ?> subido con éxito</p>
        <p>Tamaño: <?= $_FILES['archivoEnviado']['size']?>Bytes</p>
        <p>Tipo: <?= $_FILES['archivoEnviado']['type'] ?></p>
        <img src="./uploads/<?= $nombre ?>" alt="imagen" width="<?= $anchura ?>" height="<?= $altura ?>">
    <?php } ?>
</body>
</html>