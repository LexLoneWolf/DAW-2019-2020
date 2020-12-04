<?php 
    namespace Dwes\Videoclub\Model;

    class Juego extends Soporte implements Resumible {

        use \Dwes\Videoclub\Util\Logger;

        //Atributos
        public $consola;
        private $minNumJugadores;
        private $maxNumJugadores;

        //Constructor 
        public function __construct(string $titulo, int $numero, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores) {
            parent::__construct($titulo, $numero, $precio);
            $this->consola = $consola;
            $this->minNumJugadores = $minNumJugadores;
            $this->maxNumJugadores = $maxNumJugadores;
        }

        //Métodos
        public function muestraJugadoresPosibles(): void {
            if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
                $this->logCani("<br />Para un jugador");
            } else if ($this->minNumJugadores == $this->maxNumJugadores) {
                $this->logCani("<br />Para " . $this->minNumJugadores . " jugadores");
            } else {
                $this->logCani("<br />De " . $this->minNumJugadores . " a " . $this->maxNumJugadores);
            }
        }

        public function muestraResumen(): void {
            $this->logCani("<br />Juego para: " . $this->consola .
            parent::muestraResumen() .
            $this->muestraJugadoresPosibles());
        }
    }
