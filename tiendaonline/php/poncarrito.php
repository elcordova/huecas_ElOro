<?php include "config.inc" ?>
<?php 

session_start();

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
 
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
		$peticion="SELECT * FROM plato WHERE pla_id=".$_GET['p'];
		$re=mysqli_query($conexion, $peticion);
		while($f=mysqli_fetch_array($re)) {
			$nombre=$f['pla_nombre'];
			$precio=$f['pla_precio'];
			$imagen=$f['pla_foto'];
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
		$peticion="SELECT * FROM plato WHERE pla_id=".$_GET['p'];
		$re=mysqli_query($conexion, $peticion);
		while($f=mysqli_fetch_array($re)) {
			$nombre=$f['pla_nombre'];
			$precio=$f['pla_precio'];
			$imagen=$f['pla_foto'];		
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