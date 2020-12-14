<?php  

namespace Dwes\Monologos;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Processor\IntrospectionProcessor;
/**
 * Clase para pruebas de logs
 * 
 * Clase para realizar pruebas de la librería Monolog
 * 
 * @package Dwes\Monologos
 * @author LexLoneWolf <lareone91@gmail.com>
 */
class HolaMonolog {
    //Atributos
    /**
     * Variable para instanciar el Logger
     * @var Logger 
     */
    private $log;
    /**
     * Almacena una hora en formato HH
     * @var int 
     */
    private $hora;

    //Constructor 
    public function __construct($hora) {
        $this->hora = $hora;
        $this->log = new Logger("MiLog");
        $this->log->pushHandler(new RotatingFileHandler("logs/log.log",Logger::INFO));
        $this->log->pushHandler(new FirePHPHandler(Logger::DEBUG));
        $this->log->pushProcessor(new IntrospectionProcessor);

        if ($hora < 0 || $hora > 24) {
            $this->log->warning("Formato de hora incorrecto");
        }
    }

    //Getters & Setters
    public function getHora() : int {
        return $this->hora;
    }

    //Métodos
    /**
     * Saluda con un mensaje acorde a una hora 
     * 
     * El mensaje dependerá de la hora recibida en el constructor
     * Guarda un log cada vez que se ejecuta
     * 
     * @return string $saludo Devuelve el mensaje del saludo
     */
    public function saludar(): string {
        $saludo = "";
        $hora = $this->hora;
        if ($hora > 6 && $hora < 12 ) {
            $this->log->info("Buenos días");
            $saludo = "Buenos días";
        } else if ($hora < 20) {
            $this->log->info("Buenas tardes");
            $saludo = "Buenas tardes";
        } else {
            $this->log->info("Buenas noches");
            $saludo = "Buenas noches";
        } 
        return $saludo;
    }

    /**
     * Lanza un mensaje de despedida
     * 
     * Guarda un log cada vez que se ejecuta
     * 
     * @return string $despedida Devuelve el mensaje de la despedida
     */
    public function despedir(): string {
        $despedida = "";
        $this->log->info("Hasta mañana");
        $despedida = "Hasta mañana";
        return $despedida;
    }
}
