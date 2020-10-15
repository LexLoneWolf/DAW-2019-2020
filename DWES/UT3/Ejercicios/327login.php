<?php 

    $usuarios = [
        "Alexis" => "contraseñaAlexis",
        "Laura" => "contraseñaLaura",
        "Ainhoa" => "contraseñaAinhoa"
    ];

    foreach ($usuarios as $usuario => $contraseña) {
        if (!in_array($_GET["usuario"], $usuarios)) {
            include_once("327ko.php");
        } else {
            if ($_GET["usuario"] == $usuario && $_GET["contraseña"] == $contraseña) {
                include_once("327ok.php");
            }
        }
    }
    
?>

