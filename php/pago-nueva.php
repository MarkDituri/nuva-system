<?php
// Consigo los datos del form
// 1. Conectarnos a la BD
include("conexion.php");
include("sesion.php");


$titulo = $_POST['titulo_p'];
$detalles = $_POST['detalle_p'];
$id_asignado = $_POST['asignado_p'];
$fecha_pago = $_POST['fecha_pago'];
$monto_p = $_POST['monto_p'];

echo "$titulo<br>$detalles<br>$id_asignado<br>$fecha_pago<br>$monto_p<br>";

// 2. Crear la query (INSERT)
$consulta = "INSERT INTO `pagos` (`id_pago`, `status`, `estado`, `titulo`, `detalles`, `fecha_pago`, `id_usuario`, `monto`) VALUES 
(null, 'si','Pendiente','$titulo','$detalles','$fecha_pago','$id_asignado','$monto_p');";

// 3. Ejecutar la query
$consulta_ej = mysqli_query($conexion, $consulta);

if($consulta_ej == false){
    echo "Fallto ver SQL";
}

else {
    echo "<script>location.href='../pagos.php?ver_dat=si';</script>";
}
    


