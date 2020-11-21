<?php 
    namespace Dwes\Videoclub\Model;
    
    use \Dwes\Videoclub\Util\SoporteYaAlquiladoException;
    use \Dwes\Videoclub\Util\CupoSuperadoException;
    

    class Cliente implements Resumible {

        use \Dwes\Videoclub\Util\Logger;
        
        //Atributos
        public $nombre;
        private $numero = 0;
        private $soportesAlquilados = [];
        private $numSoportesAlquilados = 0;
        private $maxAlquilerConcurrente;

        //Constructor
        public function __construct(string $nombre, int $numero, int $maxAlquilerConcurrente = 3) {
            $this->nombre = $nombre;
            $this->numero = $numero;
            $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        }

        //Getters y Setters
        public function setNumero(int $numero): Cliente {
            $this->numero = $numero;
            return $this;
        }

        public function getNumero(): int {
            return $this->numero;
        }

        //Métodos
        public function tieneAlquilado(Soporte $s): bool {
            $alquilado = false;
            if (in_array($s, $this->soportesAlquilados)) {
                $alquilado = true;    
            }
            return $alquilado;
        }

        public function alquilar(Soporte $s): Cliente {
            try {
                if ($this->tieneAlquilado($s)) {
                    throw new SoporteYaAlquiladoException($s->titulo);
                } else if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
                    throw new CupoSuperadoException($this->maxAlquilerConcurrente);
                } else {
                    $this->numSoportesAlquilados++;
                    $this->soportesAlquilados[] = $s;
                    $this->logEcho("<br /><br /><strong>Alquilado soporte a: </strong>" . $this->nombre . "<br />");
                    $s->muestraResumen();
                }
            } catch (SoporteYaAlquiladoException $e) {
                $e->yaAlquilado();
            } catch (CupoSuperadoException $e) {
                $e->cupoSuperado();
            }
            
            return $this;
        }

        public function devolver(int $numSoporte): Cliente {
            try {
                $soportesAlquilados = $this->soportesAlquilados;
                if ($soportesAlquilados > 0) {
                    if ($this->tieneAlquilado($soportesAlquilados[$numSoporte])) {
                        $this->numSoporteAlquilados--;
                        $this->logEcho("Soporte devuelto correctamente");
                    }
                } else {
                    if ($this->numSoportesAlquilados == 0) {
                        throw new SoporteNoEncontradoException($this->logError("<br />Este cliente no tiene alquilado ningún elemento"));
                    } else {
                        throw new SoporteNoEncontradoException($this->logError("<br />No se ha podido encontrar el soporte 
                        en los alquileres de este cliente<br />"));
                    }  
                }
            } catch (SoporteNoEncontradoException $e) {
                $e->getMessage();
            }
            
            return $this;
        }

        public function muestraResumen(): void {
            $this->logCani($this->nombre . "<br />
            Alquileres actuales: " . $this->numSoportesAlquilados);
        }

        public function listarAlquileres(): void {
            $this->logEcho("<br /><strong>El cliente tiene: " . $this->numSoportesAlquilados . " soportes alquilados</strong><br />");
            foreach ($this->soportesAlquilados as $soporte) {
                $soporte->muestraResumen();
            }
        }
    }
    