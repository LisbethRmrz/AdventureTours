<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$telefono = $_POST['telefono'];
$cantidad = $_POST['cantidad'];
$dui = $_POST['dui'];
$lugar = $_POST['lugar'];
$direccion = $_POST['direccion'];
$fecha = date('d-m-Y');
$fecha_Viaje = $_POST['fecha'];

$consulta = "insert into solicitudes (Nombre_Completo, Correo, telefono, Cantidad_Personas, DUI, Lugar, Direccion, Fecha_Viaje, Fecha_Solicitud) values('".$nombre."','".$correo."','".$telefono."','".$cantidad."','".$dui."','".$lugar."','".$direccion."','".$fecha_Viaje."','".$fecha."')";

mysqli_query($conexion,$consulta) or die (mysqli_error($conexion));
mysqli_close($conexion);
?>