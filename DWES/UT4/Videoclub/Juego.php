<?php 


    class Juego extends Soporte {
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
                echo "<br />Para un jugador";
            } else if ($this->minNumJugadores == $this->maxNumJugadores) {
                echo "<br />Para " . $this->minNumJugadores . " jugadores";
            } else {
                echo "<br />De " . $this->minNumJugadores . " a " . $this->maxNumJugadores;
            }
        }

        public function muestraResumen(): void {
            echo "<br />Juego para: " . $this->consola;
            parent::muestraResumen();
            echo $this->muestraJugadoresPosibles();
        }
    }
