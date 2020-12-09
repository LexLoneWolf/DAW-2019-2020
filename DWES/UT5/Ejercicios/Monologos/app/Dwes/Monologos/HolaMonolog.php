<?php  

namespace Dwes\Monologos;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Processor\IntrospectionProcessor;

class HolaMonolog {
    //Atributos
    private $log;
    private $hora;

    //Constructor 
    public function __construct($hora) {
        $this->hora = $hora;
        $this->log = new Logger("MiLog");
        $this->log->pushHandler(new RotatingFileHandler("logs/log.log",Logger::INFO));
        $this->log->pushHandler(new FirePHPHandler(Logger::DEBUG));
        $this->log->pushProcessor(new IntrospectionProcessor);

    }

    //Métodos
    public function horaCorrecta() : bool {
        $hora = $this->hora;
        $horaCorrecta = false;
        if ($hora < 0 || $hora > 24) {
            $this->log->warning("Formato de hora incorrecto");
        } else {
            $horaCorrecta = true;
        }
        return $horaCorrecta;
    }

    public function saludar() {
        $hora = $this->hora;
        if ($this->horaCorrecta()) {
            if ($hora > 6 && $hora < 12 ) {
                $this->log->info("Buenos días"); 
            } else if ($hora < 20) {
                $this->log->info("Buenas tardes");
            } else {
                $this->log->info("Buenas noches");
            } 
        }
    }

    public function despedir() {
        if ($this->horaCorrecta()) {
            $this->log->info("Hasta mañana");
        } 
    }
}
