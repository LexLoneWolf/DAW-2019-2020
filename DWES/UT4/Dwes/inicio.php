<?php

    include_once("C:/xampp/htdocs/DAW-2019-2020/DWES/UT4/Dwes/Videoclub/Videoclub.php");
    include_once("C:/xampp/htdocs/DAW-2019-2020/DWES/UT4/Dwes/Videoclub/Cliente.php");
    include_once("C:/xampp/htdocs/DAW-2019-2020/DWES/UT4/Dwes/Videoclub/Soporte.php");
    include_once("C:/xampp/htdocs/DAW-2019-2020/DWES/UT4/Dwes/Videoclub/Juego.php");
    include_once("C:/xampp/htdocs/DAW-2019-2020/DWES/UT4/Dwes/Videoclub/Dvd.php");
    include_once("C:/xampp/htdocs/DAW-2019-2020/DWES/UT4/Dwes/Videoclub/CintaVideo.php");
    include_once("C:/xampp/htdocs/DAW-2019-2020/DWES/UT4/Dwes/Videoclub/Resumible.php");

    use Dwes\Videoclub\Videoclub;
    use Dwes\Videoclub\Cliente;
    use Dwes\Videoclub\Soporte;
    use Dwes\Videoclub\Juego;
    use Dwes\Videoclub\Dvd;
    use Dwes\Videoclub\CintaVideo;
    use Dwes\Videoclub\Resumible;

    $vc = Videoclub::getInstance();
    $vc->init("Video Gaga");
    //voy a incluir unos cuantos soportes de prueba
    $vc->incluirJuego("God of War",19.99,"PS4",1,1);
    $vc->incluirJuego("The Last of Us Part II",49.99,"PS4",1,1);
    $vc->incluirDvd("Torrente",4.5,"es","16:9");
    $vc->incluirDvd("Origen",4.5,"es,en,fr","16:9");
    $vc->incluirDvd("El Imperio Contraataca",3,"es,en","16:9");
    $vc->incluirCintaVideo("Los cazafantasmas",3.5,107);
    $vc->incluirCintaVideo("El nombre de la Rosa",1.5,140);
    //listo los productos
    $vc->listarProductos();
    echo "<br />";
    

    $vc2 = Videoclub::getInstance();
    $vc2->incluirSocio("Amancio Ortega");
    $vc2->incluirSocio("Pablo Picasso",2);
    $vc2->alquilarSocioProducto(0,0)->alquilarSocioProducto(0,1);
    $vc2->alquilarSocioProducto(1,2)->alquilarSocioProducto(1,3);
    // alquilo otra vez el soporte 2 al socio 1. 
    // no debe dejarme porque ya lo tiene alquilado
    // alquilo el soporte 6 al socio 1. 
    // no se puede porque el socio 1 tiene 2 alquileres como máximo
    $vc2->alquilarSocioProducto(1,2)->alquilarSocioProducto(1,6);
    
    // listo los socios
    $vc2->listarSocios();
    echo "<br />";
    $vc2->muestraResumen();
    // Alquilo los soportes 0 y 1 al socio 0 encadenando métodos.
    
    $vc2->muestraResumen();