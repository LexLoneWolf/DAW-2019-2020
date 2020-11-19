<?php 

    namespace Dwes\Videoclub;

    class Cliente implements Resumible {
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
        public function muestraResumen(): void {
            echo $this->nombre . "<br />
            Alquileres actuales: " . $this->numSoportesAlquilados;
        }

        public function tieneAlquilado(Soporte $s): bool {
            $alquilado = false;
            if (in_array($s, $this->soportesAlquilados)) {
                $alquilado = true;    
            }
            return $alquilado;
        }

        public function alquilar(Soporte $s): Cliente {
            
            if ($this->tieneAlquilado($s)) {
                echo "<br />El cliente ya tiene alquilado el soporte: <strong>" . $s->titulo . "</strong><br />";
            } else if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
                echo "<br />Este cliente tiene " . $this->maxAlquilerConcurrente .
                " elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo<br />";
            } else {
                $this->numSoportesAlquilados++;
                $this->soportesAlquilados[] = $s;
                echo "<br /><br /><strong>Alquilado soporte a: </strong>" . $this->nombre . "<br />";
                $s->muestraResumen();
            }
            return $this;
        }

        public function devolver(int $numSoporte): Cliente {
            $soportesAlquilados = $this->soportesAlquilados;
            if ($soportesAlquilados > 0) {
                if ($this->tieneAlquilado($soportesAlquilados[$numSoporte])) {
                    $this->numSoporteAlquilados--;
                    echo "Soporte devuelto correctamente";
                }
            } else {
                if ($this->numSoportesAlquilados == 0) {
                    echo "<br />Este cliente no tiene alquilado ningún elemento";
                } else {
                    echo "<br />No se ha podido encontrar el soporte en los alquileres de este cliente<br />";
                }  
            }
            return $this;
        }

        public function listarAlquileres(): void {
            echo "<br /><strong>El cliente tiene: " . $this->numSoportesAlquilados . " soportes alquilados</strong><br />";
            foreach ($this->soportesAlquilados as $soporte) {
                $soporte->muestraResumen();
            }
        }
    }
    