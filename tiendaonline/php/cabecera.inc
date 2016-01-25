<?php
session_start();
if(!isset($_SESSION['contador'])){$_SESSION['contador'] = 0;}
?>
<!doctype html>
<html lang="es">
	<head>
		<title>Tienda</title>
		<link rel=Stylesheet href="css/bootstrap.css"></script>
		<link rel=Stylesheet href="css/cabecera.css"></script>
		<link rel="stylesheet" type="text/css" href="css/imagenes.css">
    <link rel=Stylesheet href="css/movil.css" media='screen and (min-width: 1px) and (max-width: 800px)'>
		<link rel=Stylesheet href="css/pcmac.css" media='screen and (min-width: 801px) and (max-width: 4000px)'>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>




		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/codigo.js"></script>
		
	</head>
		<body>

<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="//localhost/huecas_ElOro/tiendaonline">Oro Huecas</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">SOPORTE <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>

        </form>
         
					

      

      <ul class="nav navbar-nav navbar-right">

        <li><p class="navbar-text">ya tienes una cuenta?</p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Registro</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Registrate usando
								<div class="social-buttons">
									<a href="#" class="btn btn-fb" id=""><i class="fa fa-facebook"></i> Facebook</a>
									
								</div>
                                or
								 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Correo Electronico</label>
											 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Correo Electronico" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
											 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Contraseña" required>
                                             <div class="help-block text-right"><a href="">olvidaste tu contraseña ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> Mantenerme registrado
											 </label>
										</div>
								 </form>
							</div>
							<div class="bottom text-center">
								New here ? <a href="#"><b>Join Us</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="row">

  <div class="col-md-3">
   <div class="container">
  	

					<div id="contienecarrito">
						<div id="carrito" style="background:rgb(200,200,200);color:black;">
				
							Carrito
						</div>
						<a href='php/destruir.php'><button>Vaciar carrito</button></a>
						<a href='confirmar.php'><button>Confirmar compra</button></a>
					</div>




  		</div>

  	</div>
  


		
			<div id="contenedor" class="col-md-8" >

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

			
 				

