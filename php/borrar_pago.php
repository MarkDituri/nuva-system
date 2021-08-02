<?PHP
include("conexion.php");
include("sesion.php");       

// include("sesion.php");
$id_pago = $_GET["id_pago"];

$consulta = "UPDATE pagos SET 
status = 'no' WHERE id_pago = $id_pago;";

// 3. Ejecutar la query
$consulta_ej = mysqli_query($conexion, $consulta);


if($consulta_ej == false){
    echo "<script>location.href='../pagos.php?msjerr=error';</script>";
}
else{
    echo "<script>location.href='../pagos.php?msj=est';</script>";
}

?>