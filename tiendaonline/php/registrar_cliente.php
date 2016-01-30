<?php
$cedula = $_POST['cedula'];

$nombres = $_POST['nombres'];

$apellidos = $_POST['apellidos'];

$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$contrasena= $_POST['contrasena'];


include "config.inc";
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");

$sql = 'INSERT INTO cliente (cli_cedula,cli_nombre, cli_apellido, cli_direccion, cli_telefono,cli_correo, cli_contrasena) VALUES (:cedula,:nombres, :apellidos, :direccion, :telefono,:email,:contrasena)';

$q = $conexion->prepare($sql);

$q->execute(array(':cedula'=>$cedula,':nombres'=>$nombres, ':apellidos'=>$apellidos, ':direccion'=>$direccion, ':telefono'=>$telefono, ':email'=>$email,':contrasenna'=>$contrasena));

?>