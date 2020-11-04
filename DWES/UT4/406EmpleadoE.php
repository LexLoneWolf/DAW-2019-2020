<?php 

    class Empleado {

        // Atributos
        private $nombre;
        private $apellidos;
        private $sueldo;
        private $telefonos = [];
        static $sueldoTope = 3333;

        // Constructor

        public function __construct(string $nombre, string $apellidos, int $sueldo = 1000) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->sueldo = $sueldo;
        }

        // Getters y Setters

        public function setSueldo(int $sueldo) {
            $this->sueldo=$sueldo;
        }

        public function getSueldo(): int {
            return $this->sueldo;
        }

        public function setSueldoTope(int $sueldoTope) {
            self::$sueldoTope = $sueldoTope;
        }

        public function getSueldoTope(): int {
            return self::$sueldoTope;
        }

        // Métodos

        public function imprimirNombreCompleto(): string {
            $nombreCompleto = $this->nombre . " " . $this->apellidos;
            return $nombreCompleto;
        }

        public function debePagarImpuestos(): bool {
            $impuestos = false;

            if ($this->sueldo > self::$sueldoTope) {
                $impuestos = true;
            }

            return $impuestos;
        }

        public function anyadirTelefonos(int $telefono): void {
            $this->telefonos[] = $telefono;
        }

        public function listarTelefonos(): string {
            $listaTelefonos = implode(", ", $this->telefonos);
            return $listaTelefonos;
        }

        public function vaciarTelefonos(): void {
            $listaTelVacia = [];
            $this->telefonos = $listaTelVacia;
        }

        public static function toHtml(Empleado $emp): string {
            $impuestos = "";
            if (!$this->debePagarImpuestos()) {
                $impuestos = "<p>No debe pagar impuestos</p>";
            } else {
                $impuestos = "<p>Debe pagar impuestos</p>";
            }

            $empleado = "<p>".$this->imprimirNombreCompleto()."</p>".
                $impuestos."<php if"
                
        }
    }

    $e1 = new Empleado("Alexis", "Coves Berna");

    $e1->setSueldoTope(3334);
    $e1->setSueldo(3334);

    echo "Nombre: ".$e1->imprimirNombreCompleto() . "<br />";
    
    if (!$e1->debePagarImpuestos()) {
        echo "No debe pagar impuestos"."<br />";
    } else {
        echo "Debe pagar impuestos"."<br />";
    }

    $e1->anyadirTelefonos(691317652);
    $e1->anyadirTelefonos(111222333);

    if (strlen($e1->listarTelefonos()) > 0) {
        echo "Teléfonos: ".$e1->listarTelefonos();
    }