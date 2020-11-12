<?php 

    include("Soporte.php");

    class CintaVideo extends Soporte {
        //Atributos
        private $duracion;

        //Constructor
        public function __construct(string $titulo, int $numero, float $precio, int $duracion) {
            parent::__construct($titulo, $numero, $precio);
            $this->duracion = $duracion;
        }

        public function muestraResumen(): void {
            echo "Pelicula en VHS:";
            parent::muestraResumen();
            echo "<br />Duración: " . $this->duracion . " minutos";
        }
    }
