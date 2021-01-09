
<?php 

    if (!empty($_POST["nombre"])) { ?>
        
        <table border="10">
            <tr>
                <th>Nombre</th>
                <td><?php echo $_POST["nombre"] . " " . $_POST["apellidos"] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $_POST["email"] ?></td>
            </tr>
            <tr>
                <th>Página personal</th>
                <td><?= $_POST["url"] ?></td>
            </tr>
            <tr>
                <th>Número de convivientes</th>
                <td><?= $_POST["convivientes"] ?></td>
            </tr>
            <?php if(isset($_POST["aficiones"])) { ?>
            <tr>
                <th>Aficiones</th>
                <td>
                    <ul>
                        <?php
                        foreach($_POST["aficiones"] as $aficion) { ?>
                            <li><?= $aficion ?></li>
                        <?php  } ?>
                    </ul>
                </td>
            </tr>
            <?php }
            if (isset($_POST["menu"])) { ?>
            <tr>
                <th>Platos favoritos</th>
                <td>
                    <ul>
                        <?php 
                        foreach ($_POST["menu"] as $plato) { ?>
                            <li><?= $plato ?></li>
                        <?php } ?>
                    </ul>
                </td>
            </tr>
            <?php } ?>
        </table>
    <?php  } else { ?>
        <script src="603validacion.js"></script>
        <form id="formulario" action="603validacion.php" method="POST">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" /><br />

            <label for="apellidos">Apellidos: </label>
            <input type="text" id="apellidos" name="apellidos" required /><br />

            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required /><br />

            <label for="url">URL página personal</label>
            <input type="url" name="url" id="url" required /><br />

            <label for="convivientes">Numero de convivientes en el domicilio</label>
            <input type="number" id="convivientes" name="convivientes" required /><br />
            
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

            <input type="button" value="enviar" onclick="validarFormulario()" />
        </form>
    <?php } ?>
