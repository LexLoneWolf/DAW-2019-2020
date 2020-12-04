<?php 
    namespace Dwes\Videoclub\Model;

    abstract class Soporte implements Resumible {

        use \Dwes\Videoclub\Util\Logger;

        // Atributos
        public const IVA = 1.16;
        public $titulo;
        protected $numero;
        private $precio;
        protected $alquilado;

        // Constructor
        public function __construct(string $titulo, int $numero, float $precio) {
            $this->titulo = $titulo;
            $this->numero = $numero;
            $this->precio = $precio;
            $this->alquilado = false;
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

        public function setAlquilado(bool $alquilado) {
            $this->alquilado = $alquilado;
        }

        public function getAlquilado() : bool {
            return $this->alquilado;
        }

        //Métodos
        public function muestraResumen(): void {
            $this->logCani("<br /> $this->titulo <br />" .
            $this->getPrecio() . " (IVA no incluido)");
        }
    }
