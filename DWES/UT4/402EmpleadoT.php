<?php 

    class Empleado {

        // Atributos
        private $nombre;
        private $apellidos;
        private $sueldo;
        private $telefonos = [];

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
    }

    $e1 = new Empleado();

    $e1->setNombre("Alexis");
    $e1->setApellidos("Coves Berna");
    $e1->setSueldo(3334);

    echo $e1->imprimirNombreCompleto() . "<br />";
    
    if (!$e1->debePagarImpuestos()) {
        echo "No debe pagar impuestos"."<br />";
    } else {
        echo "Debe pagar impuestos"."<br />";
    }

    $e1->anyadirTelefonos(691317652);
    $e1->anyadirTelefonos(111222333);

    echo $e1->listarTelefonos();
?>