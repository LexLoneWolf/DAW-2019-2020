<?php 

include_once "vendor/autoload.php";
include "eloquent.php";

use Dwes\Tienda\FamiliaModel;

$familias = [];
$mensaje = null;

$familias = FamiliaModel::get();

include "mostrarFamilias.php";
