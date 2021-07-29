<?php
// Consigo los datos del form
// 1. Conectarnos a la BD
include("conexion.php");
include("sesion.php");


$titulo = $_POST['titulo'];
$detalle = $_POST['detalle'];
$link_1 = $_POST['link_1'];
$link_2 = $_POST['link_2'];
$link_3 = $_POST['link_3'];
$id_responsable = $_POST['responsable'];
$fecha_1 = $_POST['fecha_1'];
$fecha_2 = $_POST['fecha_2'];
$fecha_3 = $_POST['fecha_3'];
$fecha_4 = $_POST['fecha_4'];
$email_noti_1 = $_POST['email_noti_1'];
$email_noti_2 = $_POST['email_noti_2'];

if($fecha_2 == ""){
    $fecha_2_show = "Vino vacia";
} else{
    $fecha_2_show = $_POST['fecha_2'];
}
/*
echo "   
    Titulo: $titulo<br>
    Detalle: $detalle<br>
    link_1: $link_1<br>
    link_2: $link_2<br>
    link_3: $link_3<br>
    respnsable: $id_responsable<br>
    fecha_1: $fecha_1<br>
    fecha_2: $fecha_2_show<br>    
    fecha_3: $fecha_3<br>
    fecha_4: $fecha_4<br>
";
*/




$consulta_1 = "INSERT INTO `tareas`(`id_tarea`, `status`, `estado`, `titulo`, `detalle`, `link_1`, `link_2`, `link_3`, `id_usuario`, `fecha_1`, `fecha_2`, `fecha_3`, `fecha_4`, `email_noti_1`, `email_noti_2`) VALUES
(null, 'si', 1, '$titulo', '$detalle', '$link_1', '$link_2', '$link_3', $id_responsable, '$fecha_1', '$fecha_2', '$fecha_3', '$fecha_4','$email_noti_1','$email_noti_2')";

$consulta_1_ej = mysqli_query($conexion, $consulta_1);

if($consulta_1_ej == true){        
    if($fecha_2 != ""){        
        $consulta_2 = "INSERT INTO `tareas`(`id_tarea`, `status`, `estado`, `titulo`, `detalle`, `link_1`, `link_2`, `link_3`, `id_usuario`, `fecha_1`, `email_noti_1`, `email_noti_2`) VALUES
        (null, 'si', 1, '$titulo', '$detalle', '$link_1', '$link_2', '$link_3', $id_responsable, '$fecha_2','$email_noti_1','$email_noti_2')";
        $consulta_2_ej = mysqli_query($conexion, $consulta_2);

        if($consulta_2_ej == true){
            if($fecha_3 != ""){
                $consulta_3 = "INSERT INTO `tareas`(`id_tarea`, `status`, `estado`, `titulo`, `detalle`, `link_1`, `link_2`, `link_3`, `id_usuario`, `fecha_1`, `email_noti_1`, `email_noti_2`) VALUES
                (null, 'si', 1, '$titulo', '$detalle', '$link_1', '$link_2', '$link_3', $id_responsable, '$fecha_3','$email_noti_1','$email_noti_2')";
                $consulta_3_ej = mysqli_query($conexion, $consulta_3);
                
                if($consulta_3_ej == true){
                    if($fecha_4 != ""){
                        $consulta_4 = "INSERT INTO `tareas`(`id_tarea`, `status`, `estado`, `titulo`, `detalle`, `link_1`, `link_2`, `link_3`, `id_usuario`, `fecha_1`, `email_noti_1`, `email_noti_2`) VALUES
                        (null, 'si', 1, '$titulo', '$detalle', '$link_1', '$link_2', '$link_3', $id_responsable, '$fecha_4','$email_noti_1','$email_noti_2')";
                        $consulta_4_ej = mysqli_query($conexion, $consulta_4);

                        if($consulta_4_ej == true){
                            echo "<script>location.href='../tareas.php?ver_dat=si';</script>";
                        }
                    }
                    else{
                        echo "<script>location.href='../tareas.php?ver_dat=si';</script>";
                    }
                }
            } else{
                echo "<script>location.href='../tareas.php?ver_dat=si';</script>";
            }
        } else{
            echo "<script>location.href='../tareas.php?ver_dat=si';</script>";
        }
    } else{
        echo "<script>location.href='../tareas.php?ver_dat=si';</script>";
    }
}

else {
    echo "Fallto ver SQL";
}




