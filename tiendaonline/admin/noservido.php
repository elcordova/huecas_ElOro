<?php include('../php/config.inc');?>
<?php
	if(isset($_GET['id'])){
		$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
		mysqli_set_charset($conexion, "utf8");
		$peticion = "UPDATE pedido SET ped_estado='no servido' WHERE ped_id =".$_GET['id'];
		$resultado = mysqli_query($conexion, $peticion);
		mysqli_close($conexion);
		echo "<script language='javascript'>alert('CAMBIANDO ESTADO A NO SERVIDO');</script>";
	echo "<meta http-equiv='refresh' content='0; url=pedido.php?ped_id=".$_GET['id']."'>";

	}else{
			echo "<meta http-equiv='refresh' content='1; url=index.php>";
		}


 ?>
 