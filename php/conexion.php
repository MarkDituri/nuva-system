
<?php
// conexion.php

$host= $_SERVER["HTTP_HOST"];

if($host == "localhost"){
    $conexion = new mysqli("localhost", "root","", "nuva_system");
    if ($conexion->connect_errno)
    {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit();
    }
}
else if($host == "localhost:81"){
    $conexion = new mysqli("localhost", "root","", "nuva_system");
    if ($conexion->connect_errno)
    {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit();
    }
}

else if($host == "modian.tech"){
    $conexion = new mysqli("localhost", "u878594977_nuva_user","m/P1g3w7M", "u878594977_nuva_system");
    if ($conexion->connect_errno)
    {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit();
    }
}
else if($host == "www.modian.tech"){
    $conexion = new mysqli("localhost", "u878594977_nuva_user","m/P1g3w7M", "u878594977_nuva_system");
    if ($conexion->connect_errno)
    {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit();
    }
}

// Nuvatronic.com
else if($host == "intranet-nuvatronic.com"){
    $conexion = new mysqli("localhost", "u739188509_MarcosDituri20","MarcosDituri2020!!", "u739188509_nuva_system");
    if ($conexion->connect_errno)
    {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit();
    }
}
else if($host == "www.intranet-nuvatronic.com"){
    $conexion = new mysqli("localhost", "u739188509_MarcosDituri20","MarcosDituri2020!!", "u739188509_nuva_system");
    if ($conexion->connect_errno)
    {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit();
    }
}

/* Horas */

date_default_timezone_set('America/Argentina/Buenos_Aires');                                
$DiaActual = date('d', time());  

$fechaActual = date('Y-m-d', time());  

?>
 