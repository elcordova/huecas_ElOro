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
if($contador > 0){
	$fec= date('Y-m-d H:i:s');
	$peticion = "INSERT INTO pedido VALUES (NULL,'".$total."','".$fec."','no servido','".$_SESSION['usuario']."')";
	$resultado = mysqli_query($conexion, $peticion);

	$peticion = "SELECT * FROM pedido WHERE cli_cedula = '".$_SESSION['usuario']."' ORDER BY pedido.ped_id DESC LIMIT 1";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)) {
	$_SESSION['idpedido'] = $fila['ped_id'];
	} 
	for($i = 0;$i<count($datos);$i++){
		
		$peticion = "INSERT INTO detallepedido VALUES ('".$datos[$i]['Id']."','".$_SESSION['idpedido']."','".$datos[$i]['Cantidad']."')";
		$resultado = mysqli_query($conexion, $peticion);

	}

	
	session_destroy();
	echo '
		<meta http-equiv="refresh" content="0; url=../index.php"> 
	';
	 
	
	
	
}else{
	echo '
		<meta http-equiv="refresh" content="0; url=../confirmar.php"> 
	';
}

mysqli_close($conexion);
?>
