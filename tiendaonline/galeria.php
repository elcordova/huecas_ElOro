<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php


	echo "
		<ul class='nav nav-tabs'>
  <li ><a href='hueca.php?id=".$_GET['id']."'>PLATOS</a></li>
  <li><a href='videos.php?id=".$_GET['id']."'>VIDEOS</a></li>
  <li class='active'><a href='#'>GALERIA</a></li>
  <li><a href='comollegar.php?id=".$_GET['id']."'>COMO LLEGAR</a></li>
  <li><a href='menu.php?id=".$_GET['id']."'>MENU</a></li>
		</ul>

		
	






	";
	
	echo "<style type='text/css'>
	
 
.galeria{
    width: 700px;
    margin: auto;
   
   
    padding: 20px 10px 10px 20px;
    
     
}
.galeria img{
    width: 200px;
    height: 200px;
    border: 1px solid white;
    padding: 1px;
    margin-left: 15px;
	margin-right: 5px;
    margin-bottom: 10px; 
    border: 2px solid bisque;
    border-radius: 5px;
}
		</style>";

		


?>


   <?php


    echo "<div class='galeria'>";
    
 
        $conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
		mysqli_set_charset($conexion, "utf8");

		

		$peticion2="SELECT * FROM hueca Where hue_id=".$_GET['id'];
		$resultado2=mysqli_query($conexion, $peticion2);


		while($fila = mysqli_fetch_array($resultado2)) {
			$nombrehueca = $fila['hue_nombre'];

			
		}
		
		echo "<div class='container-fluid text-center'>";
		echo "<pre><h4> <strong>".$nombrehueca." </strong></h4></pre>";
		echo "</div>";

		$peticion1="SELECT * FROM galeria Where hue_id=".$_GET['id'];
		$resultado1=mysqli_query($conexion, $peticion1);
		
		while($hueca=mysqli_fetch_array($resultado1)){
			
				
			 if (file_exists("galeria/huecas/".$nombrehueca."/".$hueca['gal_foto'])){
						echo"<a href='galeria/huecas/".$nombrehueca."/".$hueca['gal_foto']."' rel='lightbox[galeria]'><img src='galeria/huecas/".$nombrehueca."/".$hueca['gal_foto']."'/></a>";
						
						
			   
			   }                    
        }
   
	echo "</div>";
	
	echo "<div class='container-fluid text-center'>";
	echo "<pre></pre>";
	echo "</div>";

mysqli_close($conexion);

	

 ?>



<?php include "php/piedepagina.inc" ?>