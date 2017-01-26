<?php
include('../php/config.inc');
	$conexion = oci_connect($usuario,$contrasena,$db);
    if (!$conexion) {
        echo "<script>alert('error al conectar')</script>";
    }
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
	
	$peticion="BEGIN GET_PEDIDOS_LIKE(:datos_pedido,'".$consultaBusqueda."'); END;";
	$resultado = oci_parse($conexion, $peticion);
		$curs = oci_new_cursor($conexion);                 
      	oci_bind_by_name($resultado, ':datos_pedido', $curs, -1,OCI_B_CURSOR);
     	oci_execute($resultado);
      	oci_execute($curs);		

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if (($resultados = oci_fetch_array($curs, OCI_BOTH+OCI_RETURN_NULLS)) == false) {
		$mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle

		while(($resultados = oci_fetch_array($curs, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
			$id_pedido = $resultados['PED_ID'];
			$ped_fecha = $resultados['PED_FECHA'];
			$ped_pre = $resultados['PED_PRECIOT'];
			$ped_estado = $resultados['PED_ESTADO']; 
			$cedula_c=$resultados['CLI_CEDULA'];

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
