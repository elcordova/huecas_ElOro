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
            <li><a href="clientesAdmin.php">Clientes</a></li>
            <li><a href="pedidosAdmin.php">Pedidos</a></li>
            <li><a href="huecasAdmin.php">Huecas</a></li>
          </ul>
        </li>
      

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

<style type="text/css">
  body{
    padding:100px;
  }

</style>