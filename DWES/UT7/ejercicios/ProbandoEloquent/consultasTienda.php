<?php

include "vendor/autoload.php";
include "eloquent.php";

use Dwes\Tienda\TiendaModel;


// Todas las tiendas, a partir del modelo
$tiendasM = TiendaModel::all();
echo $tiendasM . "<br />";
// Todas las tiendas mediante QueryBuilder (más rápido)
$tiendasQB = TiendaModel::get();
echo $tiendasQB . "<br />";
// // Tienda por PK
$tienda = TiendaModel::find(1);
echo $tienda . "<br />";
// Tiendapor PK, si no lo encuentra lanza ModelNotFoundException
$tienda = TiendaModel::findOrFail(1);
echo $tienda . "<br />";
// 5 primeras tiendas con tlf 600100100 ordenadas por nombre
$tiendasMovil = TiendaModel::where("tlf","600100100")->orderBy("nombre")->take(5)->get();
echo $tiendasMovil . "<br />";
// Primera tienda con tlf 600100100
$tiendaMovil = TiendaModel::firstWhere("tlf","600100100");
echo $tiendaMovil . "<br />";
// Cantidad de tiendas
$count = TiendaModel::where("tlf","600100100")->count();
echo $count . "<br />";
