<?php 
    namespace Dwes\Videoclub\Model;
    
    class Dvd extends Soporte implements Resumible {

        use \Dwes\Videoclub\Util\Logger;

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
            $this->logCani("<br />Pelicula en DVD:" .
            parent::muestraResumen() .
            "<br />Idiomas: " . $this->idiomas . "<br />
            Formato: " . $this->formatPantalla);
        }
    }
