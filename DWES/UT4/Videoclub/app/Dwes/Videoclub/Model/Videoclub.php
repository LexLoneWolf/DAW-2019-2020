<?php 
    namespace Dwes\Videoclub\Model;

    use \Dwes\Videoclub\Util\SoporteYaAlquiladoException;
    use \Dwes\Videoclub\Util\CupoSuperadoException;
    use \Dwes\Videoclub\Util\SoporteNoEncontradoException;
    use \Dwes\Videoclub\Util\VideoClubException;
    
    class VideoClub implements Resumible {

        use \Dwes\Videoclub\Util\Singleton;
        use \Dwes\Videoclub\Util\Logger;
        
        //Atributos
        private string $nombre;
        private array $productos;
        private int $numProductos;
        private array $socios;
        private int $numSocios;
        private int $numProductosAlquilados;
        private int $numTotalAlquileres;

        //Constructor
        public function init(string $nombre): Videoclub {
            $this->nombre = $nombre;
            $this->productos = [];
            $this->numProductos = 0;
            $this->socios = [];
            $this->numSocios = 0;
            $this->numProductosAlquilados = 0;
            $this->numTotalAlquileres = 0;
            return $this;
        }

        //Getters 
        public function getNumProductosAlquilados() : int {
            return $this->numProductosAlquilados;
        }

        public function getNumTotalAlquileres() : int {
            return $this->numTotalAlquileres;
        }

        //obtiene un socio del array para probar funciones en inicio.php
        public function getSocio(int $numSocio) : Cliente {
            return $this->socios[$numSocio];
        }

        //Métodos
        private function incluirProducto(Soporte $s) {
            $this->productos[] = $s;
            $this->numProductos++;
            $this->logEcho("<br />Incluido soporte " . $s->getNumero() . "<br />");
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
            $this->logEcho("<br />Incluido socio " . ($this->numSocios-1));
        }

        public function listarProductos(): void {
            $numProductos = $this->numProductos;
            $this->logEcho("<br />Listado de los " . $numProductos . " productos disponibles");
            foreach ($this->productos as $producto) {
                $this->logEcho("<br />" . ($producto->getNumero()+1) . ".-<br />");
                $producto->muestraResumen();
            }
        }

        public function listarSocios(): void {
            $numSocios = $this->numSocios;
            $this->logEcho("<br />Listado de " . $numSocios . " socios del videoclub:");
            foreach ($this->socios as $socio) {
                $this->logEcho("<br />" . ($socio->getNumero()+1) . "-<br />" .
                "<br /><strong>Cliente " . $socio->getNumero() . ":</strong> ");
                $socio->muestraResumen();
            }
        }

        public function alquilarSocioProducto(int $numSocio, int $numProducto): Videoclub {
            try {
                if (key_exists($numSocio, $this->socios)) {
                    if (key_exists($numProducto, $this->productos)) {
                        $this->socios[$numSocio]->alquilar($this->productos[$numProducto]);
                        $this->numProductosAlquilados++;
                        $this->numTotalAlquileres++;
                    } else {
                        throw new VideoclubException("El producto " . $numProducto . " no existe");
                    }
                } else {
                    throw new VideoclubException("El Cliente " . $numSocio . " no existe");
                }
            } catch (SoporteYaAlquiladoException $e) {
                $e->YaAlquilado();
            } catch (CupoSuperadoException $e) {
                $e->cupoSuperado();
            } catch (VideoclubException $e) {
                $this->logError($e->getMessage());
            }
            return $this;
        }

        public function alquilarSocioProductos(int $numSocio, array $numerosProducto) : Videoclub {
            try { 
                $alquila = true;
                foreach ($numerosProducto as $producto) {
                    if (key_exists($producto, $this->productos)) {
                        if ($this->productos[$producto]->getAlquilado()) {
                            $alquila = false;
                            throw new VideoclubException("No se pudo alquilar porque el soporte $producto porque ya está alquilado");
                        }
                    } else {
                        $alquila = false;
                        throw new VideoclubException("No se pudo alquilar porque el producto $producto no existe");
                    }
                }
                if ($alquila) {
                    foreach ($numerosProducto as $producto) { 
                        $this->alquilarSocioProducto($numSocio, $producto);
                    }        
                }  
            } catch (SoporteYaAlquiladoException $e) {
                $e->YaAlquilado();
            } catch (CupoSuperadoException $e) {
                $e->cupoSuperado();
            } catch (VideoclubException $e) {
                $this->logError($e->getMessage());
            }
            return $this;
        }

        public function devolverSocioProducto(int $numSocio, int $numProducto) : Videoclub {
            try {
                if(key_exists($numSocio, $this->socios)) {
                    if (key_exists($numProducto, $this->productos)) {
                        if ($this->numProductosAlquilados > 0) {
                            $this->socios[$numSocio]->devolver($numProducto);
                            $this->numProductosAlquilados--;
                            $this->productos[$numProducto]->setAlquilado(false);
                        } else {
                            throw new VideoclubException("No hay ningún producto alquilado");
                        }
                    } else {
                        throw new VideoclubException("El producto " . $numProducto . " no existe");
                    }
                } else {
                    throw new VideoclubException("El cliente " . $numSocio . " no existe");
                }
            } catch (SoporteNoEncontradoException $e) {
                $e->noEncontrado();
            } catch (VideoclubException $e) {
                $this->logError($e->getMessage());
            }
            return $this;
        }

        public function devolverSocioProductos (int $numSocio, array $numerosProducto) : Videoclub {
            try {
                $devuelve = true;
                foreach ($numerosProducto as $producto) { 
                    if (key_exists($producto, $this->productos)) {
                        if (!$this->productos[$producto]->getAlquilado()) {
                            $devuelve = false;
                            throw new VideoclubException("No se pudo devolver el producto $producto porque no está alquilado");
                        }
                    } else {
                        throw new VideoclubException("No se pudo devolver el $producto porque no existe");
                        $devuelve = false;
                    }
                }
                if ($devuelve) {
                    foreach ($numerosProducto as $producto) {
                        $this->devolverSocioProducto($numSocio, $producto);
                    }    
                }
            } catch (SoporteNoEncontrado $e) {
                $e->noEncontrado();
            } catch (VideoclubException $e) {
                $this->logError($e->getMessage());
            }
            return $this;
        }

        public function muestraResumen(): void {
            $this->logCani("<br />Videoclub: " . $this->nombre . "<br />" .
            "Productos: " . $this->numProductos . "<br />" .
            "Socios: " . $this->numSocios . "<br />" . 
            "Productos alquilados: " . $this->numProductosAlquilados . "<br />" .
            "Total alquileres: " .  $this->numTotalAlquileres . "<br />");
        }
    }
    