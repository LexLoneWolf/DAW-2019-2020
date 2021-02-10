<?php

include "vendor/autoload.php";
include "eloquent.php";

use Dwes\Tienda\FamiliaModel;

$familias = FamiliaModel::all();

foreach ($familias as $familia) { ?>
    <p><?= $familia['cod'] . " " . $familia['nombre'] ?></p>
<?php }

$ebook = FamiliaModel::findOrFail("EBOOK");
echo "<p>" . $ebook['cod'] . " " . $ebook['nombre'] . "</p>";

$cod2o3Letras = FamiliaModel::where("cod", "regexp", "^.{0,3}$")->get(); 
foreach ($cod2o3Letras as $familia) { ?>
    <p><?= $familia['cod'] . " " . $familia['nombre'] ?></p>
<?php }

$ordenadores =  FamiliaModel::where('nombre', 'regexp', 'Ordenadores')->get();
foreach ($ordenadores as $familia) { ?>
    <p><?= $familia['cod'] . " " . $familia['nombre'] ?></p>
<?php }

$numFamOrdenadores = FamiliaModel::where('nombre', 'regexp', 'Ordenadores')->count();
echo "Número de familias de ordenadores: $numFamOrdenadores";
