<?php include "config.inc" ?>
<?php 

session_start();

$conexion = oci_connect($usuario,$contrasena,$db);
      if (!$conexion) {
         echo "<script>alert('error al conectar')</script>";
      }

 
$suma = 0;
if(isset($_GET['p']))
{
	if(isset($_SESSION['carrito'])){
		$arreglo=$_SESSION['carrito'];
		$encontro=false;
		$numero=0;
		for ($i=0; $i <count($arreglo) ; $i++) { 
			if ($arreglo[$i]['Id']==$_GET['p']){
				$encontro=true;
				$numero=$i;
				}
			}

			if ($encontro) {
				$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;				
				$_SESSION['carrito']=$arreglo;
			}else{
				$nombre="";
		$precio="";
		$peticion= "begin get_plato_id(:datos_plato,".$_GET['p']."); end;";
		$resultado = oci_parse($conexion, $peticion);
		$curs = oci_new_cursor($conexion);                 
      	oci_bind_by_name($resultado, ':datos_plato', $curs, -1,OCI_B_CURSOR);
     	oci_execute($resultado);
      	oci_execute($curs);		
		while(($f = oci_fetch_array($curs, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
			$nombre=$f['PLA_NOMBRE'];
			$precio=$f['PLA_PRECIO'];
			$imagen=$f['PLA_FOTO'];
		}
			$arreglo_nuevo=array('Id'=>$_GET['p'],
				'Nombre'=>$nombre,
				'Precio'=>$precio,
				'Foto'=>$imagen,
				'Cantidad'=>1);
			array_push($arreglo,$arreglo_nuevo);
			$_SESSION['carrito']=$arreglo;


			}
	}else{

		$nombre="";
		$precio="";
		


		$peticion= "begin get_plato_id(:datos_plato,".$_GET['p']."); end;";
		$resultado = oci_parse($conexion, $peticion);
		$curs = oci_new_cursor($conexion);                 
      	oci_bind_by_name($resultado, ':datos_plato', $curs, -1,OCI_B_CURSOR);
     	oci_execute($resultado);
      	oci_execute($curs);		
		while(($f = oci_fetch_array($curs, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
			$nombre=$f['PLA_NOMBRE'];
			$precio=$f['PLA_PRECIO'];
			$imagen=$f['PLA_FOTO'];		
		}
			$arreglo[]=array('Id'=>$_GET['p'],
				'Nombre'=>$nombre,
				'Precio'=>$precio,
				'Foto'=>$imagen,
				'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
	}
	
}



		echo "<table class='table text-center'>";
if(isset($_SESSION['carrito'])){
	$datos=$_SESSION['carrito'];
		echo "<tr><td>Detalle</td><td> Precio. U.</td><td> Cant.</td><td> Total </td></tr>";
			

		for($i = 0;$i< count($datos);$i++){
			echo "<tr><td>".$datos[$i]['Nombre']."</td><td> ".$datos[$i]['Precio']."</td><td> <input maxlength='2' size='1' class='cantidad' value='".$datos[$i]['Cantidad']."'
			data-precio='".$datos[$i]['Precio']."'
			data-id='".$datos[$i]['Id']."'
			/></td><a class='divisor'><td class='subtotal".$datos[$i]['Id']."'>".$datos[$i]['Precio']*$datos[$i]['Cantidad']."</td></a></tr>";
			
			$suma += $datos[$i]['Precio']*$datos[$i]['Cantidad'];
			}
		echo "<tr><td>Subtotal</td><td id='total'>".number_format($suma,2)."</td></tr>";
		
}else{
	echo '<tr><td><center><p>Costos de trasnporte no incluidos en el total de su pedido</p></center></td><td>';

}
		echo "</table>";


?>