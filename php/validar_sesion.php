<?php
error_reporting(0);
session_start();
//$con = new mysqli("localhost", "root", "", "cuponz");

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

//Valida que los campos de usuario y contraseña tengan datos para su validacion
@mysqli_query($conexion, "SET NAMES 'utf8'");
$email = strtolower(mysqli_real_escape_string($conexion, $_POST['email']));
$clave = mysqli_real_escape_string($conexion, $_POST['clave']);
if ($email == null || $clave == null)
{
    echo '<span>Por favor complete todos los campos.</span>';
}
else
{
    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios
    WHERE
    email = '$email'
     AND
     clave   = '$clave'");
    if (mysqli_num_rows($consulta) > 0)
    {
        $reg = mysqli_fetch_array($consulta);

        session_start();
        $_SESSION['id_usuario'] = $reg['id_usuario'];
        echo '<script>location.href = "index.php"</script>';
    }
    else
    {
        echo '<span class="cont-error">El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
    }
}   
?>