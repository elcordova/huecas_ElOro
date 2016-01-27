
			<footer>
				<h6>(c) Universidad Tecnica de  Machala -12 ava Promoción - Ingenieria de Sistemas</h6>
			</footer>
			</div>
<?php include "php/config.inc" ?>
 <div class="col-md-2">.




<blockquote>
 

<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM categoria";
$resultado = mysqli_query($conexion, $peticion);
	echo "<table class='table table-hover'> <thead>
        <tr>
            <th>CATEGORIAS</th>
        </tr>
    </thead> 
    <tbody>";
	
	
while($fila = mysqli_fetch_array($resultado)) {
	echo "<tr>";
	echo "<td><a href='categoria.php?id=".$fila['cat_id']."'>".$fila['cat_nombre']."</a></td>";
	echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
mysqli_close($conexion);
?>

</blockquote>



</div>
  </div>
	</body>
</html>
