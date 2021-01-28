<?php 

namespace Dwes\Tienda\Util;

include "../../../config/configuracion.php";

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Monolog\Handler\RotatingFileHandler;

class LogFactory {

    public static function getLogger($canal = "TiendaLogger") : LoggerInterface {
        $log = new Logger($canal);
        $log->pushHandler(new RotatingFileHandler(RUTALOGS, 0, Logger::DEBUG));
        return $log;
    }
}
