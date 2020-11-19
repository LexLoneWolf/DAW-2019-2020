<?php 

    namespace Dwes\Videoclub;

    abstract class Soporte implements Resumible {
        // Atributos
        public const IVA = 1.16;
        public $titulo;
        protected $numero;
        private $precio;

        // Constructor
        public function __construct(string $titulo, int $numero, float $precio) {
            $this->titulo = $titulo;
            $this->numero = $numero;
            $this->precio = $precio;
        }

        // Getters y Setters
        public function getPrecio(): float {
            return $this->precio;
        }

        public function getPrecioConIva(): float {
            return $this->precio * self::IVA;
        }

        public function getNumero(): int {
            return $this->numero;
        }

        //Métodos
        public function muestraResumen(): void {
            echo "<br /> $this->titulo <br />" .
            $this->getPrecio() . " (IVA no incluido)";
        }
    }
