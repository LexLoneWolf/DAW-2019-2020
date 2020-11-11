<?php 

    abstract class Persona {

        // Atributos
        public const EDAD_MAX = 21;
        protected $nombre;
        protected $apellidos;
        protected $edad;
        
        // Constructor
        public function __construct(string $nombre, string $apellidos) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
        }

        // Getters y setters
        public function setNombre(string $nombre) {
            $this->nombre=$nombre;
        }

        public function setApellidos(string $apellidos) {
            $this->apellidos=$apellidos;
        }

        public function getApellidos(): string {
            return $this->apellidos;
        }

        public function setEdad(int $edad) {
            $this->edad = $edad;
        }

        public function getEdad(): string {
            return $this->edad;
        }

        // Métodos
        abstract public function toString();

        public function imprimirNombreCompleto(): string {
            $nombreCompleto = $this->nombre . " " . $this->apellidos;
            return $nombreCompleto;
        }

        public static function toHtml(Persona $p): string {
            $empleado = "
            <p>Nombre: ". $p->imprimirNombreCompleto() . "</p>
            <p>Edad: " . $p->getEdad() . "</p>
            ";
            return $empleado;
        }
    }

    abstract class Trabajador extends Persona {

        // Atributos
        protected $telefonos = [];

        // Constructor
        public function __construct(string $nombre, string $apellidos) {
            parent::__construct($nombre, $apellidos);
        }
        // Métodos
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

        public function telefonosToHtml(): string {

            $telefonos = "";
            if (count($this->telefonos) > 0) {
                $telefonos = "<p>Teléfonos:</p><ol><li>".implode("</li><li>", $this->telefonos)."</li></ol>"; 
            }
            return $telefonos;
        }

        public function debePagarImpuestos(): bool {
            $impuestos = false;

            if ($this->edad > parent::EDAD_MAX) {
                $impuestos = true;
            }

            return $impuestos;
        }

        public function impuestos(): string {
            $impuestos = "";

            if (!$this->debePagarImpuestos()) {
                $impuestos = "No debe pagar impuestos";
            } else {
                $impuestos = "Debe pagar impuestos";
            }

            return $impuestos;
        }

        abstract public function calcularSueldo(): float;
    }

    class Empleado extends Trabajador {

        // Atributos
        protected $horasTrabajadas;
        protected $precioPorHora;

        // Constructor
        public function __construct(string $nombre, string $apellidos, int $horasTrabajadas, float $precioPorHora) {
            parent::__construct($nombre, $apellidos);
            $this->horasTrabajadas = $horasTrabajadas;
            $this->precioPorHora = $precioPorHora;
        }

        // Getters y Setters
        public function setHorasTrabajadas(int $horasTrabajadas) {
            $this->horasTrabajadas = $horasTrabajadas;
        }

        public function getHorasTrabajadas(): int {
            return $this->horasTrabajadas;
        }

        public function setPrecioPorHora(int $precioPorHora) {
            $this->precioPorHora = $precioPorHora;
        }

        public function getPrecioPorHora(): float {
            return $this->precioPorHora;
        }

        // Métodos
        public function calcularSueldo(): float {
            return $this->horasTrabajadas * $this->precioPorHora;
        }

        public static function toHtml(Persona $p): string {
            
            $empleado = "
            <p>Puesto: " . get_class($p) . "</p>"
            . parent::toHtml($p) . "
            <p>Horas trabajadas: " . $p->getHorasTrabajadas() . "</p>
            <p>Precio por hora: " . $p->getPrecioPorHora() . "</p>
            <p>Sueldo: ". $p->calcularSueldo() . "</p>
            <p>Impuestos: " . $p->impuestos() . "</p>"
            . $p->telefonosToHtml()
            ;
                
            return $empleado;       
        }

        public function toString(): string {
            $empleado = "
            <p>Puesto: Empleado</p>
            <p>Nombre: " . $this->imprimirNombreCompleto() . "</p>
            <p>Edad: " . $this->getEdad() . "</p>
            <p>Horas trabajadas: " . $this->getHorasTrabajadas() . "</p>
            <p>Precio por hora: " . $this->getPrecioPorHora() . "</p>
            <p>Sueldo: " . $this->calcularSueldo() . "€</p>
            <p>". $this->impuestos() ."</p>"
            . $this->telefonosToHtml()     
            ;
            return $empleado;
        }
    }

    class Gerente extends Trabajador {

        // Atributos
        protected $sueldo;

        // Constructor
        public function __construct($nombre, $apellidos, $sueldo) {
            parent::__construct($nombre, $apellidos);
            $this->sueldo = $sueldo;
        }
        // Getters y Setters
        public function setSueldo(float $sueldo) {
            $this->sueldo = $sueldo;
        }

        public function getSueldo(): float {
            return $this->sueldo;
        }

        // Métodos
        public function calcularSueldo(): float {
            $sueldo = ($this->sueldo + ($this->sueldo*$this->edad))/100;
            return $sueldo;
        }
        
        public static function toHtml(Persona $p): string {
            
            $empleado = "
            <p>Puesto: " . get_class($p) . "</p>"
            . parent::toHtml($p) . "
            <p>Salario: " . $p->getSalario() . "</p>
            <p>Sueldo: ". $p->calcularSueldo() . "</p>
            <p>Impuestos: " . $p->impuestos() . "</p>"
            . $p->telefonosToHtml()
            ;
                
            return $empleado;       
        }

        public function toString(): string {
            
            $empleado = "
            <p>Puesto: Gerente</p>
            <p>Nombre: " . $this->imprimirNombreCompleto() . "</p>
            <p>Edad: " . $this->getEdad() . "</p>
            <p>Salario: " . $this->getSalario() . "</p> 
            <p>Sueldo: " . $this->calcularSueldo() . "€</p>
            <p>". $this->impuestos() ."</p>"
            . $this->telefonosToHtml()     
            ;
            return $empleado;
        }
    }

    $e1 = new Empleado("Alexis", "Coves Berna", 200, 12);
    $e1->setEdad(28);
    $e1->anyadirTelefonos(691317652);
    $e1->anyadirTelefonos(111222333);

    $g1 = new Gerente("Laura", "Rodriguez García", 2500);
    $g1->setEdad(31);
    $g1->anyadirTelefonos(111222333);
    $g1->anyadirTelefonos(222333444);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>410PersonaS</title>
    </head>
    <body>
        <!-- <?= Empleado::toHtml($e1) ?> -->
        <?= $e1->toString()?>
        <?= $g1->toString() ?>
    </body>
    </html>