<?php
include('../php/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($conexion, "utf8");
	$consultaBusqueda = $_POST['valorBusqueda'];

	//Filtro anti-XSS
	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
	$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
	$mensaje="";


	if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	




	$consulta = mysqli_query($conexion, "select * from pedido where cli_cedula in( select cli_cedula from cliente where CONCAT(cliente.cli_nombre,' ',cliente.cli_apellido)LIKE '%$consultaBusqueda%' or cli_cedula COLLATE UTF8_SPANISH2_CI LIKE '%$consultaBusqueda%')");

		//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle

		while($resultados = mysqli_fetch_array($consulta)) {
			$id_pedido = $resultados['ped_id'];
			$ped_fecha = $resultados['ped_fecha'];
			$ped_pre = $resultados['ped_preciot'];
			$ped_estado = $resultados['ped_estado'];
			$cedula_c=$resultados['cli_cedula'];

			//Output
			$mensaje .= "
			<ul class='list-group'>
  			<li class='list-group-item'><a href=pedido.php?ped_id=".$id_pedido."> Codigo: ".$id_pedido." - Estado: ".$ped_estado."</a></li>
  			<li class='list-group-item'> Precio a pagar :".$ped_pre."</li>
  			<li class='list-group-item'> Fecha :".$ped_fecha."</li>
			<li class='list-group-item'> C.I. :".$cedula_c."</li>
			</ul>";

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>
