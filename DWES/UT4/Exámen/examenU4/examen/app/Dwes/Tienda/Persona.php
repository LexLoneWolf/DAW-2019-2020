<?php

// TODO: Falta poner el NS y colocar en la carpeta correcta

namespace Dwes\Tienda;

abstract class Persona {

    protected int $id = 0;
    protected string $nombre = "";
    protected string $apellidos = "";

    public function __construct($id, $nombre, $apellidos)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;        
    }

    public function getId() : int {
        return $this->id;
    }

    public function getNombreCompleto() : string {
        $nombreCompleto = $this->nombre . " " . $this->apellidos;
        return $nombreCompleto;
    }

    public function __toString() {
        $persona = "
        Id: " . $this->id . " 
        Nombre: " . $this->getNombreCompleto();
        return $persona;
    }

    // TODO: Falta el metodo mágico para sobreescribir la salida como cadena

}