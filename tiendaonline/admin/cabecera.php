<!DOCTYPE html>

<html lang="es">
	<head>
		<title>Tienda</title>
		<link rel=Stylesheet href="../css/bootstrap.css"></script>
		<link rel=Stylesheet href="../css/cabecera.css"></script>
		<link rel="stylesheet" type="text/css" href="../css/imagenes.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>	
		<script type="text/javascript" src="../js/script.js"></script> 
		<script type="text/javascript" src="../js/jquery.js"></script>
    	<script src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/jquery.countdown.js"></script>
    <script type="text/javascript" src="../js/funcion_fondo.js"></script>
    <script type="text/javascript" src="../js/ajax.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        
    </head>

    <body>

 



<nav class=" navbar-fixed-top navbar-default navbar-inverse" role="navigation">
  
  
  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
       
      <ul class="nav navbar-nav text-center ">
     <li><a href="../index.php" title="Volver al inicio">
      <img src="../img/logohuecas.png" class="img-rounded" width=110px>
      </a>
    </li>
    </ul>
      

      <ul class="nav navbar-nav navbar-right ">
    
    
  
    
    
    
        <li><a href="./admin/index.php"><b></b></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Administrar</b><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="cliente.php">Clientes</a></li>
            <li><a href="pedidosAdmin.php">Pedidos</a></li>
            <li><a href="huecasAdmin.php">Huecas</a></li>
          </ul>
        </li>
      

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Notificaciones</b> <span class="caret"></span></a>
         <ul id="login-dp" class="dropdown-menu">
          <?php

          include('notificaciones.php');

          ?>
          </ul>
          </li>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<style type="text/css">
  body{
    padding:100px;
  }

</style>