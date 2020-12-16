<?php 

include_once("vendor/autoload.php");

use \Dwes\Monologos\HolaMonolog;

$log = new HolaMonolog(20);
echo $log->saludar();
echo $log->saludar();
echo $log->saludar();
echo $log->saludar();
echo $log->despedir();
