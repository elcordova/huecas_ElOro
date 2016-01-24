<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM hueca ";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)) {
	echo "<article>";
	echo "<img src='photo/".$fila['hue_banner']."' width=100px>";
	
	
	echo "<a href='hueca.php?id=".$fila['hue_id']."'><h3>".$fila['nombre']."</h3></a>";
	echo "<p>".$fila['hue_nombre']."</p>";
	echo "<p>Horario de Atencion: ".$fila['hue_horario']."</p>";
	
	echo "<br>";
	echo "<a href='hueca.php?id=".$fila['hue_id']."'><button class='btn-info'>Más información</button></a>";
	echo "<button value='".$fila['id']."' class='botoncompra'>Comprar ahora</button>";
	echo "</article>";
} 
mysqli_close($conexion);
?>

<?php include "php/piedepagina.inc" ?>
