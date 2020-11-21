<?php 
    namespace Dwes\Videoclub\Model;
    
    use \Dwes\Videoclub\Util\SoporteYaAlquiladoException;
    use \Dwes\Videoclub\Util\CupoSuperadoException;
    use \Dwes\Videoclub\Util\SoporteNoEncontradoException;
    

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
                    $this->soportesAlquilados[$s->getNumero()] = $s;
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
                if (count($soportesAlquilados) > 0) {
                    if (array_key_exists($numSoporte, $soportesAlquilados)) {
                        $this->numSoportesAlquilados--;
                        $this->logEcho("<br />Soporte " . $soportesAlquilados[$numSoporte]->getNumero() . " devuelto correctamente<br />");
                        unset($this->soportesAlquilados[$numSoporte]);
                    } else {
                        throw new SoporteNoEncontradoException($numSoporte);
                    }
                } else {
                    $this->logError("Este cliente no tiene alquilado ningún elemento");
                }
            } catch (SoporteNoEncontradoException $e) {
               $e->noEncontrado();
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
    