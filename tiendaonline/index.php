<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>

<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM hueca";
$resultado = mysqli_query($conexion, $peticion);

echo "<div class='container-fluid text-center'>";
echo "<pre><h4> <strong> HUECAS </strong></h4></pre>";
echo "</div>";	

while($fila = mysqli_fetch_array($resultado)) {
	echo "<hr>";
	echo "<div class='row'>";
	echo "<div class='col-md-1 text-center'>";
	echo "</div>";
	echo "<div class='col-md-4 text-center'>";
	echo "<img src='galeria/logos/".$fila['hue_logo']."' width=180px   class='img-responsive'   >   ";
	
	echo "<input type='hidden' name='hora2' id='hora2' value=".$fila['hue_abre'].">";
	echo "<input type='hidden' name='hora3' id='hora3' value=".$fila['hue_cierra'].">";
	echo "<input type='hidden' name='dias' id='dias' value=".$fila['dias'].">";
	
	echo "</div><div class='col-md-7 text-center'>";
	echo "<a href='hueca.php?id=".$fila['hue_id']."' class='text-center'><h3>".$fila['hue_nombre']."</h3></a>";

	echo "<p class='text-center'>".$fila['hue_descripcion']."</p>";
	echo "<p class='text-center'>Direccion: ".$fila['hue_direccion']."</p>";
	echo "<p class='text-center'>Horario de Atencion: ".$fila['hue_horario']."</p>";
	echo "<p class='text-center'>Telefono: ".$fila['hue_telefono']."</p>";
	
	
	
	
	
	echo "</div>";
	echo "</div>";
	
	

}

	echo "<div class='container-fluid text-center'>";
	echo "<pre></pre>";
	echo "</div>";


mysqli_close($conexion);

?>




	


<?php include "php/piedepagina.inc" ?>