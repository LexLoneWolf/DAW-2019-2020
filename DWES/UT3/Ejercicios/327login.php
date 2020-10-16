<?php 

    $usuarios = [
        "Alexis" => "contraseñaAlexis",
        "Laura" => "contraseñaLaura",
        "Ainhoa" => "contraseñaAinhoa"
    ];

    if (!array_key_exists($_GET["usuario"], $usuarios)) {
        include_once("327ko.php");
        $ko = 0; // indica que el usuario es incorrecto.
    } else {
        foreach ($usuarios as $usuario => $password) {
            if ($_GET["usuario"] == $usuario && $_GET["password"] == $password) {
                include_once("327ok.php");
            } else if ($_GET["usuario"] == $usuario && $_GET["password"] != $password) {
                include_once("327ko.php");
                $ko = 1; // indica que el usuario existe pero la contraseña es incorrecta
            }
        }
    }   
?>
