<?php
// Consigo los datos del form
// 1. Conectarnos a la BD
include("conexion.php");
include("sesion.php");



$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$clave = $_POST['clave'];
$fecha = $_POST['fecha'];
$area = $_POST['area'];
$cargo = $_POST['cargo'];
$sexo = $_POST['sexo'];
$pais = $_POST['pais'];


$interno = $_POST['interno'];
$superior = $_POST["superior"];
$fecha_ing = $_POST['fecha_ing'];


$type=$_FILES['uploadedfile']['type'];
$tmp_name = $_FILES['uploadedfile']["tmp_name"];
$name = $_FILES['uploadedfile']["name"];
$target_path = "uploads/";
$URL_imagen ="uploads/". $name;
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    
    echo "El archivo ".  basename( $_FILES['uploadedfile']['name']). 
    " ha sido subido";


// 2. Crear la query (INSERT)
$consulta = "INSERT INTO `usuarios`(`id_usuario`, `tipo`, `nombre`, `apellido`, `pais`, `sexo`, `interno`, `fecha`, `area`, `cargo`, `email`, `clave`, `empresa`, `superior`, `fecha_ing`, `URL_imagen`, `acceso`) VALUES 
(null,'normal','$nombre','$apellido','$pais','$sexo','$interno','$fecha','$area','$cargo','$email','$clave','Nuvatronic','$superior','$fecha_ing','$URL_imagen','normal');";


// 3. Ejecutar la query
$consulta_ej = mysqli_query($conexion, $consulta);


if($consulta_ej == false){
echo "Fallto ver SQL";
}

else {
echo "<script>location.href='../miembros.php?ver_dat=si';</script>";
}

} else{
    // 2. Crear la query (INSERT)
    $consulta = "INSERT INTO `usuarios`(`id_usuario`, `tipo`, `nombre`, `apellido`, `pais`, `sexo`, `interno`, `fecha`, `area`, `cargo`, `email`, `clave`, `empresa`, `superior`, `fecha_ing`, `URL_imagen`, `acceso`) VALUES 
    (null,'normal','$nombre','$apellido','$pais','$sexo','$interno','$fecha','$area','$cargo','$email','$clave','Nuvatronic','$superior','$fecha_ing','uploads/user.png','normal');";
    

    // 3. Ejecutar la query
    $consulta_ej = mysqli_query($conexion, $consulta);


    if($consulta_ej == false){
    echo "Fallto ver SQL";
    }

    else {
    echo "<script>location.href='../miembros.php?ver_dat=si';</script>";
    }
    

}

