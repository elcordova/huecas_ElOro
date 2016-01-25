<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

	echo "
		<ul class='nav nav-tabs'>
  <li class='active'><a href='#'>PLATOS</a></li>
  <li><a href='videos.php?id=".$_GET['id']."'>VIDEOS</a></li>
  <li><a href='galeria.php?id=".$_GET['id']."'>GALERIA</a></li>

		</ul>

	";


?>



<?php


$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");

$peticion1="SELECT * FROM hueca Where hue_id=".$_GET['id']." LIMIT 1" ;
$resultado1=mysqli_query($conexion, $peticion1);
while($hueca=mysqli_fetch_array($resultado1)){
	echo "</br>
	<div class='row center'>
		<div class='col-md-12 text-center'>
		<p><strong><h3> ".$hueca['hue_nombre']."</h3></strong> </p>
		</div>
	</div>
	<div class='row center'>
		<div class='col-md-12 text-center'>";
			echo "<p> Direccion : ".$hueca['hue_direccion']." </p>
	</div>
	</div>
	<div class='row center'>
	<div class='col-md-12 text-center'>";
	echo "<p>horarios de Atencion ".$hueca['hue_horario']." </p>";
	echo "</div></div>

	<div class='row center'>
	<div class='col-md-12 text-center'>
	<img src='galeria/logos/".$hueca['hue_logo']." ' width=200px   class='img-circle'   > </div>  ";

}
echo "</div>";



$peticion = "SELECT * FROM plato WHERE hue_id=".$_GET['id'];
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)) {
	echo "<div class='container-fluid text-center' >";
	echo "<pre><a href='plato.php?id=".$fila['pla_id']."'><h3 > <strong> ".$fila['pla_nombre']." </strong></h3></a></pre>";
	
	echo "<img src='galeria/platos/".$fila['pla_foto']."' width=200px class='text-center'>";
	echo "<br>";
	echo "<p class='lead'>Precio: ".$fila['pla_precio']." $</p>";
	echo "<a href='plato.php?id=".$fila['pla_id']."'><button class='btn btn-primary'>Más información</button></a>";
	echo "<button value='".$fila['pla_id']."' class='botoncompra btn btn-primary'>Comprar ahora</button>";
	echo "</div>";
	echo "<br>";
	

} 
mysqli_close($conexion);
?>
<div class="container-fluid row-fluid"></div>
<?php include "php/piedepagina.inc" ?>
<script type="text/javascript">
	





</script>



