<?PHP
include("conexion.php");
include("sesion.php");       

// include("sesion.php");
$id_tarea = $_GET["id_tarea"];

$consulta = "UPDATE tareas SET 
status = 'no' WHERE id_tarea = $id_tarea;";

// 3. Ejecutar la query
$consulta_ej = mysqli_query($conexion, $consulta);


if($consulta_ej == false){
    echo "<script>location.href='../tareas.php?msjerr=error';</script>";
}
else{
    echo "<script>location.href='../tareas.php?msj=est';</script>";
}

?>