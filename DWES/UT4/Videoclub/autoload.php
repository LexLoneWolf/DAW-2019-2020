<?php 
    spl_autoload_register( function( $NombreClase ) {
        $NombreClase=str_replace("\\","/",$NombreClase);
        include_once 'app/'. $NombreClase . '.php';
        } );
    