<?php include "config.inc" ?>

<?php
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$horario = $_POST['horario'];
$logo = $_POST['logo'];
$banner = $_POST['banner'];
$menu = $_POST['menu'];
$video = $_POST['video'];
$abre = $_POST['abre'];
$cierra = $_POST['cierra'];
$dias = $_POST['dias'];
$latitud = $_POST['latitud'];
$longitud= $_POST['longitud'];
$id = $_POST['categoria'];




$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");

$sql = "INSERT INTO hueca (hue_nombre,hue_descripcion, hue_direccion, hue_telefono ,hue_horario, hue_logo, hue_banner, hue_menu, hue_video,hue_abre,hue_cierra,dias,latitud,longitud,cat_id) VALUES ('".$nombre."','".$descripcion."','".$direccion."','".$telefono."','".$horario."','".$logo."','".$banner."','".$menu."','".$video."','".$abre."','".$cierra."','".$dias."','".$latitud."','".$longitud."','".$id."')";
mysqli_query($conexion, $sql);
echo '<script language="javascript">alert("juas");</script>'; 

?>