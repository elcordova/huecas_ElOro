<?php
include('php/config.inc');
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
	




	$consulta = mysqli_query($conexion, "select * from hueca where hue_descripcion like '%$consultaBusqueda%'or hue_nombre like '%$consultaBusqueda%'");

		//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No se encontraron resultados</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle

		while($resultados = mysqli_fetch_array($consulta)) {
			$nombre_hueca = $resultados['hue_nombre'];
			$codigo = $resultados['hue_id'];
			$direccion = $resultados['hue_direccion'];
			$logo = $resultados['hue_logo'];
			
			//Output
			$mensaje .= "
  			<li class='list-group-item search-query'><a href=hueca.php?id=".$codigo."> Codigo: ".$codigo." - ".$nombre_hueca."</a></li>";

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>