<?php

spl_autoload_register( function( $nombreClase ) {
    $nombre = "app/".$nombreClase;
    include_once str_replace('\\', DIRECTORY_SEPARATOR, $nombre).'.php';
} );
