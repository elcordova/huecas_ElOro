
			<footer>
				<h6>(c) Universidad Tecnica de  Machala -12 ava Promoción - Ingenieria de Sistemas</h6>
			</footer>
			</div>
<?php include "php/config.inc" ?>
 <div class="col-md-2">.
<blockquote>
 
<H2>categorias</H2>

<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM categorias";
$resultado = mysqli_query($conexion, $peticion);
	echo "<ul>";
while($fila = mysqli_fetch_array($resultado)) {
	echo "<li>".$fila['detalle']."</li>";
	} 
	echo "</ul>";

mysqli_close($conexion);
?>

</blockquote>



</div>
  </div>
	</body>
</html>
