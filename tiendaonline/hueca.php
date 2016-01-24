<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
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

<?php include "php/piedepagina.inc" ?>
<script type="text/javascript">
	





</script>