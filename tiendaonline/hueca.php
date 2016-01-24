<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM plato WHERE hue_id=".$_GET['id'];
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)) {
	echo "<article>";
	echo "<a href='plato.php?id=".$fila['pla_id']."'><h3>".$fila['pla_nombre']."</h3></a>";
	echo "<p>Precio: ".$fila['pla_precio']." €</p>";
	echo "<img src='galeria/platos/".$fila['pla_foto']."' width=100px>";
	echo "<br>";
	echo "<a href='plato.php?id=".$fila['pla_id']."'><button>Más información</button></a>";
	echo "<button>Comprar ahora</button>";
	echo "</article>";
} 
mysqli_close($conexion);
?>

<?php include "php/piedepagina.inc" ?>
