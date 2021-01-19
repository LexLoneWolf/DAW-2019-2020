<?php 
    if (!isset($error)) {
        $error = "";
    }
?>
<form action='611login.php' method='post'>
    <fieldset>
        <legend>Login</legend>
        <span class='error'><?= $error ?></span>
        
        <label for='usuario'>Usuario:</label><br />
        <input type='text' name='inputUsuario' id='usuario' maxlength="50" /><br />
        
        <label for='password'>Contraseña:</label><br />
        <input type='password' name='inputPassword' id='password' maxlength="50" /><br />
        
        <input type='submit' name='enviar' value='Enviar' />      
    </fieldset>
</form>