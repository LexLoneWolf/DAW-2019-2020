<?php 

    namespace Dwes\Videoclub;
    
    class Dvd extends Soporte implements Resumible {
        //Atributos
        public $idiomas;
        private $formatPantalla;

        //Constructor
        public function __construct(string $titulo, int $numero, float $precio, string $idiomas, string $formatPantalla) {
            parent::__construct($titulo, $numero, $precio);
            $this->idiomas = $idiomas;
            $this->formatPantalla = $formatPantalla;
        }

        // Métodos
        public function muestraResumen(): void {
            echo "<br />Pelicula en DVD:";
            parent::muestraResumen();
            echo "<br />Idiomas: " . $this->idiomas . "<br />
            Formato: " . $this->formatPantalla;
        }
    }
