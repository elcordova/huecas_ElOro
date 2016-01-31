<?php

session_start();
	include('cabecera.php');
    include('../php/config.inc');
	if (isset($_SESSION['admin'])) {

echo "
		<ul class='nav nav-tabs'>
  <li><a href='pedidosAdmin.php'>PEDIDOS POR HUECA</a></li>
  <li><a href='pedidos_estado.php'>PEDIDOS POR ESTADO</a></li>
  <li class='active'><a href='#'>PEDIDOS POR CLIENTE</a></li>
		</ul><br>";
?>
	<div class="container-fluid text-center">
	<form class="form-inline" role="form">
  		<div class="form-group">
    		<label for="cedula">Cedula de Identidad:</label>
    		<input type="cedula" class="form-control" name="busqueda" id="busqueda"autocomplete="off" onKeyUp="buscar();" />
    	</div>
  		<button type="submit" class="btn btn-default">Buscar</button>
	</form>

	<div id="resultadoBusqueda"></div>




<script type="text/javascript">
	function buscar() 
	{
    	var textoBusqueda = $("input#busqueda").val();

    	if (textoBusqueda != "") {
        	$.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
        	}); 
    	} else { 
        	("#resultadoBusqueda").html('');
		};
	};

</script>





	</div>
	





<?php

}else{

		echo "<script language='javascript'>alert('AUN NO SE HA IDENTIFICADO');</script>";
		echo "<meta http-equiv='Refresh' content='5;url=adminLog.php'>";
	}
?>

<?php include('piepagina.php') ?>
