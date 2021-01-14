<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="609formulariosResumen.php" method="POST">
        <label for="convivientes">Numero de convivientes en el domicilio</label>
        <input type="number" id="convivientes" name="convivientes" /><br />

        <label for="aficiones[]">Aficiones</label><br />
        <input type="checkbox" name="aficiones[]" value="videojuegos" /> Videojuegos<br />
        <input type="checkbox" name="aficiones[]" value="guitarra" /> Guitarra<br />
        <input type="checkbox" name="aficiones[]" value="cine" /> Cine<br />
        <input type="checkbox" name="aficiones[]" value="programar"/> Programar<br />

        <label for="menu[]">Platos favoritos</label><br />
        <select name="menu[]" id="menu" multiple>
        <option value="carbonara">Carbonara</option>
        <option value="croquetas">Croquetas</option>
        <option value="pizza">Pizza</option>
        <option value="hamburguesa">Hamburguesa</option>
        </select><br/>

        <input type="submit" value="enviar" />
    </form>
</body>
</html>

