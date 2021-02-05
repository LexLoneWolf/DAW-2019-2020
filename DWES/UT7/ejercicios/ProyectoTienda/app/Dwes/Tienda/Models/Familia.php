<?php 

namespace Dwes\Tienda;

class Familia {

    private string $cod;
    private string $nombre;
    
    public function __construct(string $cod = null, string $nombre = null) {
        $this->cod = $cod;
        $this->nombre = $nombre;   
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function getCod() : string {
        return $this->cod;
    }
}
