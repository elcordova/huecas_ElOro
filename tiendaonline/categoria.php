<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM hueca WHERE cat_id=".$_GET['id'].";";
$nombre = "SELECT * FROM categoria WHERE cat_id=".$_GET['id'].";";
$resultado = mysqli_query($conexion, $peticion);
$resultado1 = mysqli_query($conexion, $nombre);


while($fila = mysqli_fetch_array($resultado1)) {
	echo "<div class='container-fluid text-center'>";
	echo "<pre><h4> <strong> HUECAS: ".$fila['cat_nombre']." </strong></h4></pre>";
	echo "</div>";

	
}



while($fila = mysqli_fetch_array($resultado)) {
	
	
	echo "<div class='row'>";
	echo "<div class='col-md-1 text-center'>";
	echo "</div>";
	echo "<div class='col-md-10 text-center'>";
	echo "<article>";
	echo "<img src='galeria/logos/".$fila['hue_logo']."' width=150px   class='img-circle'>   ";
	
	
	echo "<a href='hueca.php?id=".$fila['hue_id']."'><h3>".$fila['hue_nombre']."</h3></a>";

	echo "<p class='text-center'>".$fila['hue_descripcion']."</p>";
	echo "<p class='text-center'>Horario de Atencion: ".$fila['hue_horario']."</p>";
	echo "<p class='text-center'>Telefono: ".$fila['hue_telefono']."</p>";
	
	echo "<br>";
	// echo "<a href='hueca.php?id=".$fila['hue_id']."'><button class='btn-info'>Más información</button></a>";
	echo "</article>";
	echo "</div>";
	echo "<div class='col-md-1 text-center'>";
	echo "</div>";
	echo "</div>";
	
}

	echo "<div class='container-fluid text-center'>";
	echo "<pre></pre>";
	echo "</div>";

mysqli_close($conexion);
?>

<?php include "php/piedepagina.inc" ?>