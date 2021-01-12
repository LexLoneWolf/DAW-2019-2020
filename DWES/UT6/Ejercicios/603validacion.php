<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error {color: #FF0000}</style>
    <title>603validacion</title>
</head>
<body>
    
<?php 

    $nombre = $_POST["nombre"] ?? "";
    $apellidos = $_POST["apellidos"] ?? "";
    $email = $_POST["email"] ?? "";
    $url = $_POST["url"] ?? "";
    $genero = $_POST["genero"] ?? "";
    $convivientes = $_POST["convivientes"] ?? 0;
    $aficiones = $_POST["aficiones"] ?? [];
    $menu = $_POST["menu"] ?? [];
    $obligatorio = "Campo obligatorio";
    $nombreErr = $apellidosErr = $emailErr = $urlErr = $generoErr = $convivientesErr = "";
    $ok = false;

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

    if ($ok) { ?>
        
        <table border="10">
            <tr>
                <th>Nombre</th>
                <td><?php echo $nombre . " " . $apellidos; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <th>Página personal</th>
                <td><?= $url ?></td>
            </tr>
            <tr>
                <th>Género</th>
                <td><?= $genero ?></td>
            </tr>
            <tr>
                <th>Número de convivientes</th>
                <td><?= $convivientes ?></td>
            </tr>
            <?php if(isset($aficiones)) { ?>
            <tr>
                <th>Aficiones</th>
                <td>
                    <ul>
                        <?php
                        foreach($aficiones as $aficion) { ?>
                            <li><?= $aficion ?></li>
                        <?php  } ?>
                    </ul>
                </td>
            </tr>
            <?php }
            if (isset($menu)) { ?>
            <tr>
                <th>Platos favoritos</th>
                <td>
                    <ul>
                        <?php 
                        foreach ($menu as $plato) { ?>
                            <li><?= $plato ?></li>
                        <?php } ?>
                    </ul>
                </td>
            </tr>
            <?php } ?>
        </table>
    <?php  } else { ?>
        <script src="603validacion.js"></script>
        <form id="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" onsubmit="return validarFormulario()">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" value="<?= $nombre ?>" required/>
            <span class="error">* <?= $nombreErr ?></span><br />

            <label for="apellidos">Apellidos: </label>
            <input type="text" id="apellidos" name="apellidos" value="<?= $apellidos ?>" required />
            <span class="error">* <?= $apellidosErr ?></span><br />

            <label for="email">Email: </label>
            <input type="email" name="email" id="email" value="<?= $email ?>" required />
            <span class="error">* <?= $emailErr ?></span><br />

            <label for="url">URL página personal</label>
            <input type="url" name="url" id="url" value="<?= $url ?>" required />
            <span class="error">* <?= $urlErr ?></span><br />

            <input type="radio" name="genero" value="hombre" <?php if(isset($genero) && $genero == "hombre") echo "checked"; ?>/> Hombre
            <input type="radio" name="genero" id="mujer" value="mujer" <?php if(isset($genero) && $genero == "mujer") echo "checked"; ?>/> Mujer
            <input type="radio" name="genero" id="otro" value="otro" <?php if(isset($genero) && $genero == "otro") echo "checked"; ?>/> Otro
            <span class="error">*  <?= $generoErr ?></span><br />

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
    <?php } ?>

</body>
</html>
