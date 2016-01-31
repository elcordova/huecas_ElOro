<?php 
	include('../php/config.inc');
	$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($conexion, "utf8");
	$peticion = "SELECT pedido.ped_id,pedido.ped_fecha, pedido.ped_preciot, cliente.cli_nombre FROM pedido,cliente WHERE cliente.cli_cedula=pedido.cli_cedula and ped_estado='no servido'";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)) {
		echo "<li><a href='pedido.php?ped_id=".$fila['ped_id']."'>cod:".$fila['ped_id']." a :".$fila['cli_nombre']." por: ".$fila['ped_preciot']."</a></li>";

	}


 ?>