<?php 

namespace Dwes\Tienda\Database;

use PDO;

class PDOFactory {

    public static function getConexion(): PDO {

        $config = include "config/configuracion.php";
        
        $conexion = new PDO(
            $config["db"]["dsn"],
            $config["db"]["username"],
            $config["db"]["password"],
            $config["db"]["options"]
        );

    return $conexion;
    }
}