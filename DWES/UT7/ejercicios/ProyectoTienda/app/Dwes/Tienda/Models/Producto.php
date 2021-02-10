<?php 

namespace Dwes\Tienda;

class Producto {

    private string $cod;
    private string $nombre;
    private string $nombre_corto;
    private string $descripcion;
    private float $pvp;
    private string $familia;
    
    public function __construct(string $cod = null, string $nombre = null,
        string $nombre_corto = null, string $descripcion = null,
        float $pvp = 0, string $familia = null) {

        $this->cod = $cod;
        $this->nombre = $nombre;   
        $this->nombre_corto = $nombre_corto;
        $this->descripcion = $descripcion;
        $this->pvp = $pvp;
        $this->familia = $familia;
    }

    public function getCod() : string {
        return $this->cod;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function setNombreCorto(string $nombre_corto) {
        $this->nombre_corto = $nombre_corto;
    }

    public function getNombreCorto() : string {
        return $this->nombre_corto;
    }

    public function setDescripcion(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() : string {
        return $this->descripcion;
    }

    public function setPvp(float $pvp) {
        $this->pvp = $pvp;
    }

    public function getPvp() : float {
        return $this->pvp;
    }

    public function setFamilia(string $familia) {
        $this->familia = $familia;
    }

    public function getFamilia() : string {
        return $this->familia;
    }
}
