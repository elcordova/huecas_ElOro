<?php include "config.inc" ?>

<?php
$cedula = $_POST['cedula'];

$nombres = $_POST['nombre'];

$apellidos = $_POST['apellido'];

$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$contra= $_POST['contra'];



$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");

UPDATE Cliente SET nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, email = :email WHERE cedula=:idEquipo

$sql = "INSERT INTO cliente (cli_cedula,cli_nombre, cli_apellido, cli_direccion, cli_telefono,cli_correo, cli_contrasena) VALUES ('".$cedula."','".$nombres."','".$apellidos."','".$direccion."','".$telefono."','".$correo."','".$contra."')";
mysqli_query($conexion, $sql);
echo '<script language="javascript">alert("juas");</script>'; 

?>