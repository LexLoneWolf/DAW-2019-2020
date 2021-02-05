<?php 

namespace Dwes\Tienda\Util;

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Monolog\Handler\RotatingFileHandler;

class LogFactory {

    public static function getLogger(string $canal = "TiendaLogger", string $ruta = "config/logs/tienda.log") : LoggerInterface {
        $log = new Logger($canal);
        $log->pushHandler(new RotatingFileHandler($ruta, 0, Logger::DEBUG));
        return $log;
    }
}
