<?php
require "autoload.php";

use Dwes\Tienda\Cliente;
use Dwes\Tienda\Producto;
use Dwes\Tienda\Direccion;

$c = new Cliente(1,"Juan","Becerra");
$c->setDireccionEntrega(new Direccion("avenida", 33, "1", "A" ));
$ps5 = new Producto(1, "PS5", 500);
$ps5->setDescripcion("Con DualSense incluido");
$c->pedir($ps5);
echo "¡He encontrado una!: ".$ps5;

$xbox1 = new Producto(1, "XBox X", 500);
// $c->pedir($xbox1); 
// debe lanzar una TiendaExcepción : Producto ya existente con el mismo id=1

$xbox2 = new Producto(2, "XBox X", 500);
$c->pedir($xbox2); 

$ns = new Producto(3, "Nintendo Switch", 300);
$c->pedir($ns);

echo "<br>".$c->getNombreCompleto()." es VIP?: ".$c->esVip();
echo "<br>".$c;

echo Cliente::getResumenPedido($c);

echo "<br> Le ponemos dirección de facturación";
$dFactura = new Direccion();
$dFactura->setCalle("Avda Libertad")->setNumero(3)->setPlanta(33)->setPuerta(333);
$c->setDireccionFactura($dFactura);
echo Cliente::getResumenPedido($c);

echo "<br> Devolvemos un producto";
// $c->devolver(666);
// debe lanzar una TiendaExcepción : El producto 666 no se puede devolver pq no existía
$c->devolver(2);
echo Cliente::getResumenPedido($c);