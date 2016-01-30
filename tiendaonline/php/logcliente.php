<?php include "config.inc" ?>
<?php
session_start();


$contador = 0;

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM cliente WHERE cli_cedula = '".$_POST['usuario']."' AND cli_contrasena = '".$_POST['contrasena']."'";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)) {
	$contador++;
	$_SESSION['usuario'] = $fila['cli_cedula'];
} 
$total=0;
if(isset($_SESSION['carrito'])){
	$datos=$_SESSION['carrito'];
		for($i = 0;$i< count($datos);$i++){
			$total+= $datos[$i]['Precio']*$datos[$i]['Cantidad'];
		}

}
echo "'".$_SESSION['usuario']."'";
echo "-".$total."-";	
echo "-".$contador."-";	
if($contador > 0){
	
	$peticion = "INSERT INTO pedido VALUES (NULL,'".$total."','".date('U')."','por_atender','".$_SESSION['usuario']."')";
	$resultado = mysqli_query($conexion, $peticion);

	$peticion = "SELECT * FROM pedido WHERE cli_cedula = '".$_SESSION['usuario']."' ORDER BY ped_fecha DESC LIMIT 1";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)) {
	$_SESSION['idpedido'] = $fila['ped_id'];
	} 
	echo $_SESSION['idpedido'];

	for($i = 0;$i<count($datos);$i++){
		
		$peticion = "INSERT INTO detallepedido VALUES ('".$datos[$i]['Id']."','".$_SESSION['idpedido']."','".$datos[$i]['Cantidad']."')";
		$resultado = mysqli_query($conexion, $peticion);

	}

	

	 

	echo "<br>Tu pedido se ha realizado satisfactoriamente. Redirigiendo a la página principal en 5 segundos...";
	session_destroy();
	echo '
		<meta http-equiv="refresh" content="5; url=../index.php"> 
	';
	 
	
	
	
}else{
	echo "El usuario no existe. Volviendo a la tienda en 5 segundos...";
	echo '
		<meta http-equiv="refresh" content="5; url=../confirmar.php"> 
	';
}

mysqli_close($conexion);
include "piedepagina.inc"; 
?>
