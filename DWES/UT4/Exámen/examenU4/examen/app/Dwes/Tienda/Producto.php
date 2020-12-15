<?php 

namespace Dwes\Tienda;

class Producto {

    private int $id;
    private string $nombre;
    private string $descripcion;
    private float $precio; 

    public function __construct(int $id, string $nombre, float $precio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = "";
    }

    public function getId() : int {
        return $this->id;
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function getPrecio() : float {
        return $this->precio;
    }

    public function getDescripcion() : string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion) : Producto {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function __toString() {

        $producto =
        "Dwes\Tienda\Producto[". $this->id. "]" .
        $this->nombre . " " .
        $this->precio . " / " .
        $this->descripcion . "<br /><br />";

        return $producto;
    }
}
