<?php 

include_once("vendor/autoload.php");

use \Dwes\Monologos\HolaMonolog;

$log = new HolaMonolog(20);
$log->saludar();
$log->despedir();
