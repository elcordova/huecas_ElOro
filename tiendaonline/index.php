<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM hueca";
$resultado = mysqli_query($conexion, $peticion);

	

while($fila = mysqli_fetch_array($resultado)) {
	echo "<div class='row'>";
	echo "<div class='col-md-6'>";
	echo "<img src='galeria/logos/".$fila['hue_logo']."' width=200px   class='img-responsive'   >   ";
	
	echo "<input type='hidden' name='hora2' id='hora2' value=".$fila['hue_abre'].">";
	echo "<input type='hidden' name='hora3' id='hora3' value=".$fila['hue_cierra'].">";
	echo "<input type='hidden' name='dias' id='dias' value=".$fila['dias'].">";
	
	echo "</div><div class='col-md-6'>";
	echo "<a href='hueca.php?id=".$fila['hue_id']."' class='text-center'><h3>".$fila['hue_nombre']."</h3></a>";

	echo "<p>Horario de Atencion: ".$fila['hue_horario']."</p>";
	
	
	
	
	
	echo "</div>";
	echo "</div>";
	
	

}



mysqli_close($conexion);

?>




	


<?php include "php/piedepagina.inc" ?>
<button class="img-responsive"></button>