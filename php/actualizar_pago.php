<?php

include("conexion.php");
include("sesion.php");       

$id_pago = $_GET["id_pago"];
$id_usuario = $_GET["id_usuario"];

echo "Id_Pago: $id_pago <br>";
echo "Id_usuario: $id_usuario <br>";


//Actualizar pedido
$result="UPDATE pagos
SET estado = 'Pago'
WHERE id_pago = $id_pago;";

$resutl_ej = mysqli_query( 
    $conexion, $result
);

if ($resutl_ej = $conexion->query($result)) {
    $sql_pago = "SELECT * FROM `pagos` WHERE `status` = 'si' AND `id_pago` = $id_pago";
    $sql_pago_ej = mysqli_query($conexion, $sql_pago);

    while($dato = mysqli_fetch_array($sql_pago_ej)) {
        $id_pago = $dato['id_pago'];
        $titulo = $dato['titulo'];
        $id_usuario = $dato['id_usuario'];
        $fecha_pago = $dato['fecha_pago'];
    
        $sql_responsable = "SELECT * FROM `usuarios` WHERE id_usuario = $id_usuario;";                                            
        $sql_responsable_ej = mysqli_query(
            $conexion, $sql_responsable
        );                                                
        while($dato = mysqli_fetch_array($sql_responsable_ej)) {
            $id_usuario = $dato['id_usuario'];
            $nombre_responsable = $dato['nombre'];
            $apellido_responsable = $dato['apellido'];
            $email_noti_1 = $dato['email'];
        } 


        echo "$nombre_responsable: $apellido_responsable $email_noti_1";
        echo "Enviando Notificacion...";

 
   
        include("mailer/envios/notificacion_pagos.php");       
        return false;

        header("Location: ../pagos.php?ver_dat=si"); /* Redirección del navegador */
    } 

} else{
    header("Location: ../pagos.php?ver_dat=err"); /* Redirección del navegador */
}
