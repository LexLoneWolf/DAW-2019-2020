<?php 

    if (!empty($_GET["nombre"])) {


    } else { 
    ?> 
        <form action="602formulario.php" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" /><br />
            <label for="apellidos">Apellidos: </label>
            <input type="text" id="apellidos" name="nombre" /><br />

            <label for="email">Email: </label>
            <input type="email" name="email" id="email" /><br />

            <label for="url">URL página personal</label>
            <input type="text" name="url" id="url" /><br />

            <label for="convivientes">Numero de convivientes en el domicilio</label>
            <input type="number" id="convivientes" name="convivientes" /><br />
            
            <label for="aficiones">Aficiones</label><br />
            <input type="checkbox" name="aficiones[]" value="videojuegos" /> Videojuegos<br />
            <input type="checkbox" name="aficiones[]" value="guitarra" /> Guitarra<br />
            <input type="checkbox" name="aficiones[]" value="cine" /> Cine<br />
            <input type="checkbox" name="aficiones[]" value="programar"/> Programar<br />

            <label for="menu">Platos favoritos</label><br />
            <select name="menu[]" id="menu" multiple>
            <option value="carbonara">Carbonara</option>
            <option value="croquetas">Croquetas</option>
            <option value="pizza">Pizza</option>
            <option value="hamburguesa">Hamburguesa</option>
            </select><br/>

            <input type="submit" value="enviar" />
        </form>
    }

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>602formulario</title>
</head>
<body>

    

    <table border=1>
        <tr>
            <th>Nombre:</th>
            <td><?= $nombre ?></td>
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
            <th>Número de convivientes</th>
            <td><?= $convivientes ?></td>
        </tr>
    </table>



</body>
</html>