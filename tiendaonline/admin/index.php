<?php session_start();
	include('cabecera.php');
	if (isset($_SESSION['admin'])) {
?>


<div class="jumbotron">
  <div class="container">
  <b><h2>Sitio de Administración</h2></b>
    <p>Las Funcionalidades de el sitio de Administracion estan reservadas para usuarios Específicos. Los cambios que se realicen desde este sitio, afectaran a todos los formularios.</p>
    <p><a class="btn btn-primary btn-lg" href="../php/destruir.php" role="button">SALIR</a></p>
  </div>
</div>

<?php


	}else{

		echo "<script language='javascript'>alert('AUN NO SE HA IDENTIFICADO');</script>";
		echo "<meta http-equiv='Refresh' content='5;url=adminLog.php'>";
	}
?>
<?php include('piepagina.php') ?>
   


