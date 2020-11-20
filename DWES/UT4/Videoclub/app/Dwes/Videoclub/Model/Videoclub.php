<?php 
    namespace Dwes\Videoclub\Model;
    
    class VideoClub implements Resumible {
        //Atributos
        use \Dwes\Videoclub\Util\Singleton;
        private string $nombre;
        private array $productos;
        private int $numProductos;
        private array $socios;
        private int $numSocios;

        //Constructor
        public function init(string $nombre): Videoclub {
            $this->nombre = $nombre;
            $this->productos = [];
            $this->numProductos = 0;
            $this->socios = [];
            $this->numSocios = 0;
            return $this;
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
            $juego = new Juego($titulo, $this->numProductos, $precio, $consola, $minJ, $maxJ); 
            $this->incluirProducto($juego);
        }

        public function incluirSocio(string $nombre, int $maxAlquileresConcurrentes = 3) {
            $socio = new Cliente($nombre, $this->numSocios, $maxAlquileresConcurrentes);
            $this->numSocios++;
            $this->socios[] = $socio;
            echo "<br />Incluido socio " . ($this->numSocios-1);
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
                echo "<br />" . ($socio->getNumero()+1) . "-<br />";
                echo "<br /><strong>Cliente " . $socio->getNumero() . ":</strong> ";
                $socio->muestraResumen();
            }
        }

        public function alquilarSocioProducto(int $numSocio, int $numProducto): Videoclub {     
            if ($numSocio >= 0 && $numSocio <= count($this->socios)) {
                if ($numProducto >= 0 && $numProducto <= count($this->productos)) {
                    $this->socios[$numSocio]->alquilar($this->productos[$numProducto]);
                }
            }
            return $this;
        }

        public function muestraResumen(): void {
            echo "<br />Videoclub: " . $this->nombre . "<br />" .
            "Productos: " . $this->numProductos . "<br />" .
            "Socios: " . $this->numSocios;
        }
    }