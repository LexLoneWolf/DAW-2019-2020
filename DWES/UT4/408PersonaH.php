<?php 

    class Persona {

        // Atributos
        protected $nombre;
        protected $apellidos;

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

        // Métodos
        public function imprimirNombreCompleto(): string {
            $nombreCompleto = $this->nombre . " " . $this->apellidos;
            return $nombreCompleto;
        }

        public static function toHtml(Persona $p): string {
            $nombre = $p->imprimirNombreCompleto();
            $empleado = "<p>Nombre: $nombre</p>";
            return $empleado;
        }
    }



    class Empleado extends Persona {

        // Atributos
        private $sueldo;
        private $telefonos = [];
        static $sueldoTope = 3333;

        // Constructor
        public function __construct(string $nombre, string $apellidos, int $sueldo = 1000) {
            parent::__construct($nombre, $apellidos);
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

        public static function toHtml(Persona $p): string {
            $sueldo = $p->getSueldo();
            $impuestos = "";
            $telefonos = "";

            if (count($p->telefonos) > 0) {
                $telefonos = "<p>Teléfonos:</p><ol><li>".implode("</li><li>", $p->telefonos)."</li></ol>";
            }

            if (!$p->debePagarImpuestos()) {
                $impuestos = "No debe pagar impuestos";
            } else {
                $impuestos = "Debe pagar impuestos";
            }

            $empleado = parent::toHtml($p)."
            <p>Sueldo: $sueldo</p>
            <p>Impuestos: $impuestos</p>
            $telefonos
            ";
                
            return $empleado;       
        }
    }

    $e1 = new Empleado("Alexis", "Coves Berna");

    $e1->setSueldoTope(3334);
    $e1->setSueldo(3334);
    $e1->anyadirTelefonos(691317652);
    $e1->anyadirTelefonos(111222333);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>408PersonaH</title>
    </head>
    <body>
        <?= Empleado::toHtml($e1) ?>
    </body>
    </html>