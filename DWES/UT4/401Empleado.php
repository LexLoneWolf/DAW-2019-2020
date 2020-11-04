<?php 

    class Empleado {


        // Atributos
        private $nombre;
        private $apellidos;
        private $sueldo;

        // Getters y Setters

        public function setNombre(string $nombre) {
            $this->nombre=$nombre;
        }

        public function getNombre(): string {
            return $this->nombre;
        }

        public function setApellidos(string $apellidos) {
            $this->apellidos=$apellidos;
        }

        public function getApellidos(): string {
            return $this->apellidos;
        }

        public function setSueldo(int $sueldo) {
            $this->sueldo=$sueldo;
        }

        public function getSueldo(): int {
            return $this->sueldo;
        }

        // Métodos

        public function imprimirNombreCompleto(): string {
            $nombreCompleto = $this->nombre . " " . $this->apellidos;
            return $nombreCompleto;
        }

        public function debePagarImpuestos(): bool {
            $impuestos = false;

            if ($this->sueldo > 3333) {
                $impuestos = true;
            }

            return $impuestos;
        }
    }

    $e1 = new Empleado();

    $e1->setNombre("Alexis");
    $e1->setApellidos("Coves Berna");
    $e1->setSueldo(3334);

    echo "Nombre: ".$e1->imprimirNombreCompleto() . "<br />";
    
    if (!$e1->debePagarImpuestos()) {
        echo "No debe pagar impuestos";
    } else {
        echo "Debe pagar impuestos";
    }
?>