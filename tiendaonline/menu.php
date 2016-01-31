<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

	echo "
		<ul class='nav nav-tabs'>
  <li><a href='hueca.php?id=".$_GET['id']."'>PLATOS</a></li>
  <li><a href='#'>VIDEOS</a></li>
  <li><a href='galeria.php?id=".$_GET['id']."'>GALERIA</a></li>
	<li><a href='comollegar.php?id=".$_GET['id']."'>COMO LLEGAR</a></li>
	<li class='active'><a href='#'>MENU</a></li>
		</ul>

		";
	$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($conexion, "utf8");

	$peticion1="SELECT * FROM hueca Where hue_id=".$_GET['id']." LIMIT 1" ;
	$resultado1=mysqli_query($conexion, $peticion1);		

	while($hueca=mysqli_fetch_array($resultado1)){
		if($hueca['hue_menu']==""){
			echo "<br><br><div class='danger text-center'> <h2> NO EXISTE MENU ASOCIADO </h2> </div>";
		}else
		{
			echo "
					<div class='container'>
					<img src='galeria/menus/".$hueca['hue_menu']."' class='img-rounded' width=700px />
					</div>


			";	
		}

	}



	


?>
<?php include "php/piedepagina.inc" ?>