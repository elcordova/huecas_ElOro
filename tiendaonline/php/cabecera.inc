<?php
session_start();
if(!isset($_SESSION['contador'])){$_SESSION['contador'] = 0;}
?>
<?php include "php/config.inc" ?>
<!doctype html>
<html lang="es">
	<head>
		<title>Tienda</title>
		<link rel=Stylesheet href="css/bootstrap.css"></script>
		<link rel=Stylesheet href="css/cabecera.css"></script>
		<link rel="stylesheet" type="text/css" href="css/imagenes.css">
		
		<link rel=Stylesheet href="css/pcmac.css" media='screen and (min-width: 801px) and (max-width: 4000px)'>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.smooth-scroll.min.js"></script>
		<script type="text/javascript" src="js/lightbox.js"></script>
		<link rel="stylesheet" type="text/css" href="css/lightbox.css">
		
		
		
		<script type="text/javascript" src="js/script.js"></script>
    
		<script type="text/javascript" src="js/ajax.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<script type="text/javascript" src="js/jquery.countdown.js"></script>
		<script type="text/javascript" src="js/codigo.js"></script>
		<script type="text/javascript" src="js/jquery.flipster.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true">
		</script>
		<script type="text/javascript" src="js/gmaps.js"></script>
		
		
		  <script type="text/javascript" src="js/ajax.js"></script>
		  <script type="text/javascript" src="js/bootbox.js"></script>
		  <script type="text/javascript" src="js/bootbox.min.js"></script>

		
		  
	</head>
		<body>


<style type="text/css">
  .flotante {
display:scroll;
position:fixed;
bottom:320px;
right:0px;
}

</style>
<nav class=" navbar-fixed-top navbar-default navbar-inverse" role="navigation">
  
	
  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
       
	    <ul class="nav navbar-nav navbar-left ">
	   <li><a href="index.php" title="Volver al inicio">
		  <img src="./img/logohuecas.png" class="img-rounded" width=110px>
		  </a>
		</li>
		</ul>
      

      <ul class="nav navbar-nav navbar-right ">
	  
		
	
		<form class="nav navbar-nav" role="search">
      
          <div class="form-group">
          <input type="text" class="form-control" placeholder="Ingresar dato">
        </div>
        </form>
		
        <li><a href="./admin/index.php"><b>Administrar</b></a></li>
        <li><a href="./FLASH DE LA REVISTA/proyecto-revista.html" target="_blank"><b>Revista</b></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Soporte </b><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Celular: 0980398960</a></li>
			<li class="divider"></li>
            <li><a href="#">Correo: carlos.andres.1994@hotmail.com</a></li>
            <li class="divider"></li>
            <li><a href="quienesSomos.php">Acerca de..</a></li>
            <li class="divider"></li>
            
          </ul>
        </li>
      
		<li><a href="./carrito.php"><b>Carrito</b></a></li>

        
    <li><a href="./carrito.php" title="Ver carrito de compras">
      <img src="./img/carrito1.png" class="img-rounded" width=40px>
      </a>
    </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="row">



   <div class=" col-md-2">.
    <blockquote>

    <?php 


    $conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
    mysqli_set_charset($conexion, "utf8");
    $peticion = "SELECT * FROM categoria";
    $resultado = mysqli_query($conexion, $peticion);
    echo "<table class='table table-hover'> <thead>
        <tr>
            <th>CATEGORIAS</th>
        </tr>
    </thead> 
    <tbody>";
  
  
    while($fila = mysqli_fetch_array($resultado)) {
      echo "<tr>";
      echo "<td><a href='categoria.php?id=".$fila['cat_id']."'>".$fila['cat_nombre']."</a></td>";
      echo "</tr>";
      } 
      echo "</tbody>";
      echo "</table>";
    mysqli_close($conexion);
    ?>

	</blockquote>
	</div>
		
			
<div id="contenedor" class="col-md-10" >

 <header>	
 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/banner.png">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="img/banner.png">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="img/banner.png">
      <div class="carousel-caption">
      </div>
    </div>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->

					
</header>


			
 				

