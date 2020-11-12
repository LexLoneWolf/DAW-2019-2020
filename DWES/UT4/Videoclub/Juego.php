<?php 

    include("Soporte.php");

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
            if ($minNumJugadores == 1 && $maxNumJugadores == 1) {
                echo "Para un jugador";
            } else if ()
        }

        public function muestraResumen(): void {
            echo "<br>Juego para: " . $this->consola;
            parent::muestraResumen();
            echo $this->muestraJugadoresPosibles();
        }
    }
