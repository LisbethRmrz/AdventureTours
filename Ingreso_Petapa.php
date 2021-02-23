<?php
include 'conexion.php';

$id = 'VP_003';
$nombre = $_POST['nombre'];
$dui = $_POST['dui'];
$correo = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fecha = date('d-m-Y');

$consulta = "insert into reservaciones (ID_Destino, Nombre_Completo, DUI, Correo, Direccion, Telefono, Fecha_Reserva) values('".$id."','".$nombre."','".$dui."','".$correo."','".$direccion."','".$telefono."','".$fecha."')";

mysqli_query($conexion,$consulta) or die (mysqli_error($conexion));
mysqli_close($conexion);
?>