<?php

// TODO: Falta poner el NS y colocar en la carpeta correcta

namespace Dwes\Tienda;

class Direccion {
    private string $calle;
    private int $numero;
    private string $planta;
    private string $puerta;

    public function __construct(string $calle = "", int $numero = -1, string $planta = "", string $puerta = "")
    {
        $this->calle =  $calle;
        $this->numero =  $numero;
        $this->planta =  $planta;
        $this->puerta =  $puerta;
    }

    public function getCalle() : string {
        return $this->calle;
    }

    public function setCalle(string $calle) : Direccion {
        $this->calle = $calle;
        return $this;
    }

    public function getNumero() : int {
        return $this->numero;
    }

    public function setNumero(int $numero) : Direccion {
        $this->numero = $numero;
        return $this;
    }

    public function getPlanta() : string {
        return $this->planta;
    }

    public function setPlanta(string $planta) : Direccion {
        $this->planta = $planta;
        return $this;
    }

    public function getPuerta() : string {
        return $this->puerta;
    }

    public function setPuerta(string $puerta) : Direccion {
        $this->puerta = $puerta;
        return $this;
    }

    public function __toString() {
        return "";
    }

    // TODO: Falta el metodo mágico para sobreescribir la salida como cadena

}