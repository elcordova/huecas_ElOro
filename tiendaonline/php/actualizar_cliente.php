<?php include "config.inc" ?>

<?php

echo '<script language="javascript">alert("juas");</script>'; 

$cedula = $_POST['cedula'];

$nombres = $_POST['nombre'];

$apellidos = $_POST['apellido'];

$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$contra= $_POST['contra'];


$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);

mysqli_set_charset($conexion, "utf8");

// $sql = 'UPDATE cliente SET cli_nombre=:nombre, cli_apellido=:apellido, cli_direccion=:direccion, cli_telefono=:telefono, cli_correo = :email , cli_contrasena = :contra WHERE cli_cedula=:idEquipo';

// $q = $conexion->prepare($sql);

// $q->execute(array(':nombre'=>$nombre,':apellido'=>$apellido, ':direccion'=>$direccion, ':telefono'=>$telefono, ':email'=>$correo,  ':contra'=>$contra,':idEquipo'=>$cedula));

$sql = "UPDATE cliente SET cli_nombre='".$nombres."',cli_apellido='".$apellidos."',cli_direccion='".$direccion."',cli_telefono='".$telefono."',cli_correo='".$correo."',cli_contrasena='".$contra."' WHERE cli_cedula='".$cedula."'";
mysqli_query($conexion, $sql);


?>