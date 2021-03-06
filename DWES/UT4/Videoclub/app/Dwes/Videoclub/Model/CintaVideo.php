<?php 
    namespace Dwes\Videoclub\Model;
    
    class CintaVideo extends Soporte implements Resumible {

        use \Dwes\Videoclub\Util\Logger;

        //Atributos
        private $duracion;

        //Constructor
        public function __construct(string $titulo, int $numero, float $precio, int $duracion) {
            parent::__construct($titulo, $numero, $precio);
            $this->duracion = $duracion;
        }

        //Métodos
        public function muestraResumen(): void {
            $this->logCani("Pelicula en VHS:" .
            parent::muestraResumen() .
            "Duración: " . $this->duracion . " minutos");
        }
    }
