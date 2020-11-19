<?php 

    spl_autoload_register( function( $NombreClase ) {
        include_once $NombreClase.'.php';
        } );
    