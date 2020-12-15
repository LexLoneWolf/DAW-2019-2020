<?php
    namespace Dwes\Tienda;

    class Cliente extends Persona {

        private array $productos;
        private Direccion $direccionEntrega;
        private Direccion $direccionFactura;
        
        public function __construct(int $id, string $nombre, string $apellidos) {
            parent::__construct($id, $nombre, $apellidos);
            $this->productos = [];
        }

        public function getDireccionEntrega() : string {
            return $this->direccionEntrega;
        }

        public function getDireccionFactura() : string {
            return $this->direccionFactura;
        }

        
        public function setDireccionEntrega(Direccion $direccionEntrega) {
            $this->direccionEntrega = $direccionEntrega;
        }

        public function setDireccionFactura(Direccion $direccionFactura) {
            $this->direccionFactura = $direccionFactura;
        }

        public function pedir(Producto $prod) : Cliente {
            try {
                if (in_array($prod, $this->productos)) {
                    throw new TiendaException("Producto ya existente con el mismo id =" . $prod->getId());
                } else {
                    $this->productos[] = $prod;
                }   
            } catch (TiendaException $e) {
                echo $e->getMessage();
            }
            return $this;
        }

        public function devolver(int $idProducto) : Cliente {
            try {
                if (array_key_exists($idProducto, $this->productos)) {
                    unset($idProducto, $this->productos);
                } else {
                    throw new TiendaException("No existe el producto $idProducto");
                }
            } catch (TiendaException $e) {
                echo $e->getMessage();
            }
            
            return $this;
        }

        public function getGastoTotal() : float {
            $productos = $this->productos;
            $gastoTotal = 0;
            foreach ($productos as $producto) {
                $gastoTotal += $producto->getPrecio();
            }
            return $gastoTotal;
        }

        public function esVip() : bool {
            $vip = false;
            if ($this->getGastoTotal() > 1000) {
                $vip = true;
            }
            return $vip;
        }

        public function getResumenPedido(Cliente $cli) : string {

            $resumen = "<br /> 
            Nombre: " . $cli->getNombreCompleto() . "<br /><br/>
            Productos: " . count($cli->productos) . "<br /><br />
            Gastos: " . $cli->getGastoTotal() . "<br /><br /><hr />";
            return $resumen;
        }

        public function __toString() {

            return "";
        }


    }
