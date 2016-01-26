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
	
	echo "</div><div class='col-md-6'>";
	echo "<a href='hueca.php?id=".$fila['hue_id']."' class='text-center'><h3>".$fila['hue_nombre']."</h3></a>";

	echo "<p>Horario de Atencion: ".$fila['hue_horario']."</p>";
	
	echo "<div id='cart_cerrado' class='round5 carrito-cerrado'>
			
			
			<div class='add-info'>
				 
				<p style='color:#D06E6D; font-size: 17px; padding-top: 10px;'>Este establecimiento se encuentra cerrado.</p>
								<div>
					<p style='color:#EBADAC;'>ABRE EN</p>
					<p> ".$fila['hue_abre']."</p>";
					
			echo "</div>";
				
			echo "</div>";
			
			echo "</div>";
	
	
	echo "</div>";
	// echo "<a href='hueca.php?id=".$fila['hue_id']."'><button class='btn-info'>Más información</button></a>";
	
	echo "</div>";
	
}
mysqli_close($conexion);
?>

<?php include "php/piedepagina.inc" ?>
<button class="img-responsive"></button>