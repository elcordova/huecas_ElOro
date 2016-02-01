<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

	echo "
		<ul class='nav nav-tabs'>
  <li><a href='hueca.php?id=".$_GET['id']."'>PLATOS</a></li>
  <li class='active'><a href='#'>VIDEO</a></li>
  <li><a href='galeria.php?id=".$_GET['id']."'>GALERIA</a></li>
<li><a href='comollegar.php?id=".$_GET['id']."'>COMO LLEGAR</a></li>
<li><a href='menu.php?id=".$_GET['id']."'>MENU</a></li>
		</ul>

		";
	$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($conexion, "utf8");

	$peticion1="SELECT * FROM hueca Where hue_id=".$_GET['id']." LIMIT 1" ;
	$resultado1=mysqli_query($conexion, $peticion1);		

	while($hueca=mysqli_fetch_array($resultado1)){
		if($hueca['hue_video']==""){
			echo "<br><br><div class='danger text-center'><b> <h4> NO EXISTE VIDEO ASOCIADO </h4> </b></div>";
		}else
		{
			echo "
			<div class='embed-container'>
 			<iframe src='".$hueca['hue_video']."' frameborder='0'> </iframe>
			</div>
			";	
		}

	}



	


?>
<?php include "php/piedepagina.inc" ?>