<?php

include("conexion.php");
include("sesion.php");       

$id_tarea = $_GET["id_tarea"];
$id_estado_tarea = $_GET["id_estado_tarea"];

//Actualizar pedido
$result="UPDATE tareas
SET estado = '$id_estado_tarea'
WHERE id_tarea = $id_tarea;";

$resutl_ej = mysqli_query( 
    $conexion, $result
);

if ($resutl_ej = $conexion->query($result)) {
    $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si' AND `id_tarea` = $id_tarea";
    $sql_tarea_ej = mysqli_query($conexion, $sql_tarea);

    while($dato = mysqli_fetch_array($sql_tarea_ej)) {
        $id_tarea = $dato['id_tarea'];
        $titulo = $dato['titulo'];
        $detalle = $dato['detalle'];
        $link_1 = $dato['link_1'];
        $link_2 = $dato['link_2'];
        $link_3 = $dato['link_3'];
        $id_estado = $dato['estado'];
        $id_responsable = $dato['id_usuario'];
        $fecha_1 = $dato['fecha_1'];
        $fecha_2 = $dato['fecha_2'];
        $fecha_3 = $dato['fecha_3'];
        $fecha_4 = $dato['fecha_4'];
        $email_noti_1 = $dato['email_noti_1'];
        $email_noti_2 = $dato['email_noti_2'];
        
        $fechaEntera = strtotime($fecha_1);
        $anio = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        $dia = date("d", $fechaEntera);
        
        $hora = date("H", $fechaEntera);
        $minutos = date("i", $fechaEntera);
        $segundos = date("s", $fechaEntera);
        
        $sql_estado_tarea = "SELECT * FROM `estados_tareas` WHERE id_estado_tarea = $id_estado;";                                            
        $sql_estado_tarea_ej = mysqli_query(
            $conexion, $sql_estado_tarea
        );                                                
        while($dato = mysqli_fetch_array($sql_estado_tarea_ej)) {
            $icono_estado = $dato['icono'];
        }

        $sql_responsable = "SELECT * FROM `usuarios` WHERE id_usuario = $id_responsable;";                                            
        $sql_responsable_ej = mysqli_query(
            $conexion, $sql_responsable
        );                                                
        while($dato = mysqli_fetch_array($sql_responsable_ej)) {
            $id_responsable = $dato['id_usuario'];
            $nombre_responsable = $dato['nombre'];
            $apellido_responsable = $dato['apellido'];
        } 


        if($id_estado_tarea == 3){
            echo "Enviando Notificacion...";
          
            include("mailer/envios/notificacion_tareas.php");       
   
          
        }
        header("Location: ../tareas.php?ver_dat=si"); /* Redirección del navegador */
    } 

} else{
    header("Location: ../tareas.php?ver_dat=err"); /* Redirección del navegador */
}

