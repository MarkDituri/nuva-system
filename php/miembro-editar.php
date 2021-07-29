<?php
// Consigo los datos del form
// 1. Conectarnos a la BD
include("conexion.php");
include("sesion.php");

$id_usuario = $_POST['id_miembro'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha = $_POST['fecha'];
$area = $_POST['area'];
$cargo = $_POST['cargo'];
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
$consulta = "UPDATE usuarios  SET nombre = '$nombre', apellido = '$apellido', 
fecha = '$fecha',  area = '$area', pais = '$pais',  cargo = '$cargo', superior = '$superior',  interno = '$interno', fecha_ing = '$fecha_ing', URL_imagen = '$URL_imagen'
WHERE id_usuario= $id_usuario;";


// 3. Ejecutar la query
$consulta_ej = mysqli_query($conexion, $consulta);


if($consulta_ej == false){
echo "Fallto ver SQL";
}

else {
echo "<script>location.href='../perfil.php?id_miembro=$id_usuario&ver_dat=si';</script>";
}

} else{
    // 2. Crear la query (INSERT)
    $consulta = "UPDATE usuarios  SET nombre = '$nombre', apellido = '$apellido', 
    fecha = '$fecha',  area = '$area', pais = '$pais',  cargo = '$cargo', superior = '$superior',  interno = '$interno', fecha_ing = '$fecha_ing'
    WHERE id_usuario= $id_usuario;";

    // 3. Ejecutar la query
    $consulta_ej = mysqli_query($conexion, $consulta);


    if($consulta_ej == false){
    echo "Fallto ver SQL";
    }

    else {
        echo "<script>location.href='../perfil.php?id_miembro=$id_usuario&ver_dat=si';</script>";
    }
    
}

