<?php 

    include_once("Cliente.php");
    include_once("Soporte.php");
    include_once("Juego.php");
    include_once("Dvd.php");
    include_once("CintaVideo.php");

    class VideoClub {
        //Atributos
        private $nombre;
        private $productos = [];
        private $numProductos = -1;
        private $socios = [];
        private $numSocios = -1;

        //Constructor
        public function __construct(string $nombre) {
            $this->nombre = $nombre;
        }

        //Métodos
        private function incluirProducto(Soporte $s) {
            $this->productos[] = $s;
        }

        public function incluirCintaVideo(string $titulo, float $precio, int $duracion) {
            $this->numProductos++;
            $cinta = new CintaVideo($titulo, $this->numProductos, $precio, $duracion);
            $this->incluirProducto($cinta);
            echo "Incluido soporte " . $this->numProductos . "<br />";
        }

        public function incluirDvd(string $titulo, float $precio, string $idiomas, string $formatoPantalla) {
            $this->numProductos++;
            $dvd = new Dvd($titulo, $this->numProductos, $precio, $idiomas, $formatoPantalla);
            $this->incluirProducto($dvd);
            echo "Incluido soporte " . $this->numProductos . "<br />";
        }

        public function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ) {
            $this->numProductos++;
            $juego = new Juego($titulo, $this->numProductos , $precio, $consola, $minJ, $maxJ); 
            $this->incluirProducto($juego);
            echo "Incluido soporte " . $this->numProductos . "<br />";
        }

        public function incluirSocio(string $nombre, int $maxAlquileresConcurrentes = 3) {
            $this->numSocios++;
            $socio = new Cliente($nombre, $this->numSocios, $maxAlquileresConcurrentes);
            $this->socios[] = $socio;
            echo "<br />Incluido socio " . $this->numSocios;
        }

        public function listarProductos(): void {
            $numProductos = $this->numProductos+1;
            echo "<br />Listado de los " . $numProductos . " productos disponibles";
            foreach ($this->productos as $producto) {
                echo "<br />" . ($producto->getNumero()+1) . ".-<br />";
                $producto->muestraResumen();
            }
        }

        public function listarSocios(): void {
            $numSocios = $this->numSocios+1;
            echo "<br />Listado de " . $numSocios . " socios del videoclub:";
            $i = 1;
            foreach ($this->socios as $socio) {
                
                echo "<br />$i.-<br />";
                echo "<br /><strong>Cliente " . $socio->getNumero() . ":</strong> ";
                $socio->muestraResumen();
                $i++;
            }
        }

        public function alquilaSocioProducto(int $numSocio, int $numProducto) {
            foreach ($this->productos as $producto) {
                if ($producto->getNumero() == $numProducto) {
                    foreach ($this->socios as $socio) {
                        if ($socio->getNumero() == $numSocio) {
                            $socio->alquilar($producto);
                        }
                    }
                }
            }    
        }
    }
