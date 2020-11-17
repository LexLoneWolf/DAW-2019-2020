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
        private $numProductos = 0;
        private $socios = [];
        private $numSocios = 0;

        //Constructor
        public function __construct(string $nombre) {
            $this->nombre = $nombre;
        }

        //Métodos
        private function incluirProducto(Soporte $s) {
            $this->productos[] = $s;
            $this->numProductos++;
            echo "Incluido soporte " . $s->getNumero() . "<br />";
        }

        public function incluirCintaVideo(string $titulo, float $precio, int $duracion) {
            $cinta = new CintaVideo($titulo, $this->numProductos, $precio, $duracion);
            $this->incluirProducto($cinta);
            
        }

        public function incluirDvd(string $titulo, float $precio, string $idiomas, string $formatoPantalla) {
            $dvd = new Dvd($titulo, $this->numProductos, $precio, $idiomas, $formatoPantalla);
            $this->incluirProducto($dvd);
        }

        public function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ) {
            $juego = new Juego($titulo, $this->numProductos , $precio, $consola, $minJ, $maxJ); 
            $this->incluirProducto($juego);
        }

        public function incluirSocio(string $nombre, int $maxAlquileresConcurrentes = 3) {
            $this->numSocios++;
            $socio = new Cliente($nombre, $this->numSocios, $maxAlquileresConcurrentes);
            $this->socios[] = $socio;
            echo "<br />Incluido socio " . $this->numSocios;
        }

        public function listarProductos(): void {
            $numProductos = $this->numProductos;
            echo "<br />Listado de los " . $numProductos . " productos disponibles";
            foreach ($this->productos as $producto) {
                echo "<br />" . ($producto->getNumero()+1) . ".-<br />";
                $producto->muestraResumen();
            }
        }

        public function listarSocios(): void {
            $numSocios = $this->numSocios;
            echo "<br />Listado de " . $numSocios . " socios del videoclub:";
            foreach ($this->socios as $socio) {
                echo "<br />" .$socio->getNumero() . "-<br />";
                echo "<br /><strong>Cliente " . ($socio->getNumero()-1) . ":</strong> ";
                $socio->muestraResumen();
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
