<?php  

session_start();
$email = $_POST['email'] ?? "";
$url = $_POST['url'] ?? "";
$genero = $_POST['genero'] ?? "";
$emailErr = $urlErr = $generoErr = "";
$obligatorio = "Campo obligatorio";
$ok = false;

$_SESSION['genero'] = $genero;
$_SESSION['email'] = $email;
$_SESSION['url'] = $url;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ok = true;
    if (empty($_POST["email"])) {
        $emailErr = $obligatorio;
        $ok = false;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email incorrecto";
            $ok = false;
        }
    }
    
    if (empty($_POST["url"])) {
        $urlErr = $obligatorio;
        $ok = false;
    } else {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $urlErr = "Formato de URL incorrecto";
            $ok = false;
        }
    }

    if (empty($_POST["genero"])) {
        $generoErr = $obligatorio;
        $ok = false;
    } 
}

if ($ok) {
    header("Location: 609formularios3.php");
    exit();
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error {color: #FF0000}</style>
    <title>609formularios2</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?= $email ?>" required="true" />
        <span class="error">* <?= $emailErr ?></span><br />

        <label for="url">URL página personal</label>
        <input type="url" name="url" id="url" value="<?= $url ?>" required="true" />
        <span class="error">* <?= $urlErr ?></span><br />

        <input type="radio" name="genero" value="hombre" <?php if(isset($genero) && $genero == "hombre") echo "checked"; ?>/> Hombre
        <input type="radio" name="genero" id="mujer" value="mujer" <?php if(isset($genero) && $genero == "mujer") echo "checked"; ?>/> Mujer
        <input type="radio" name="genero" id="otro" value="otro" <?php if(isset($genero) && $genero == "otro") echo "checked"; ?>/> Otro
        <span class="error">*  <?= $generoErr ?></span><br />

        <input type="submit" value="Siguiente" />

    </form>
</body>
</html>