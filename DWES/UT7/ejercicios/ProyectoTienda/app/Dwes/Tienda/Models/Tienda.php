<?php 

namespace Dwes\Tienda;

class Tienda {

    private int $cod;
    private string $nombre;
    private int $tlf;  
    
    public function __construct(int $cod = 0, string $nombre = null, string $tlf = null) {
        $this->cod = $cod;
        $this->nombre = $nombre;
        $this->tlf = $tlf;   
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function setTlf(int $tlf) {
        $this->tlf = $tlf;
    }

    public function getTlf() : int {
        return $this->tlf;
    }

    public function getCod() : int {
        return $this->cod;
    }
}
