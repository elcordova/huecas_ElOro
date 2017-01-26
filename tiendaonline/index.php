<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>

<?php

	$conexion = oci_connect($usuario,$contrasena,$db);
      if (!$conexion) {
         echo "<script>alert('error al conectar')</script>";
      }

      $peticion = "begin GET_ALL_HUECAS(:cursor_return); end;";
      $resultado = oci_parse($conexion, $peticion);
      $curs = oci_new_cursor($conexion);                 
      //declara el contenedor del cursor devuelto por el procedimeinto GET_ALL_CATEGORIAS()
      oci_bind_by_name($resultado, ':cursor_return', $curs, -1,OCI_B_CURSOR);
      oci_execute($resultado);
      oci_execute($curs);

echo "<div class='container-fluid text-center'>";
echo "<pre><h4> <strong> HUECAS </strong></h4></pre>";
echo "</div>";	


while(($fila = oci_fetch_array($curs, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
	echo "<hr>";
	echo "<div class='row'>";
	echo "<div class='col-md-1 text-center'>";
	echo "</div>";
	echo "<div class='col-md-4 text-center'>";
	echo "<img src='galeria/logos/".$fila['HUE_LOGO']."' width=180px   class='img-responsive'   >   ";
	
	echo "<input type='hidden' name='hora2' id='hora2' value=".$fila['HUE_ABRE'].">";
	echo "<input type='hidden' name='hora3' id='hora3' value=".$fila['HUE_CIERRA'].">";
	echo "<input type='hidden' name='dias' id='dias' value=".$fila['DIAS'].">";
	
	echo "</div><div class='col-md-7 text-center'>";
	echo "<a href='hueca.php?id=".$fila['HUE_ID']."' class='text-center'><h3>".$fila['HUE_NOMBRE']."</h3></a>";

	echo "<p class='text-center'>".$fila['HUE_DESCRIPCION']."</p>";
	echo "<p class='text-center'>Direccion: ".$fila['HUE_DIRECCION']."</p>";
	echo "<p class='text-center'>Horario de Atencion: ".$fila['HUE_HORARIO']."</p>";
	echo "<p class='text-center'>Telefono: ".$fila['HUE_TELEFONO']."</p>";
	
	echo "</div>";
	echo "</div>";
	
	

}

	echo "<div class='container-fluid text-center'>";
	echo "<pre></pre>";
	echo "</div>";


oci_close($conexion);

?>




	


<?php include "php/piedepagina.inc" ?>