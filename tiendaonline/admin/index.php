<!DOCTYPE html>

<html>
    <head>
        
        <title>Login</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        
    </head>

    <body>

<?php
	session_start();
	if (isset($_SESSION['admin'])) {

		?>


<a href='pedidos.php'>Gestionar pedidos</a>
<a href='clientes.php'>Gestionar clientes</a>
<a href='productos.php'>Gestionar productos</a>



		<?php


	}else{

		echo "<script language='javascript'>alert('AUN NO SE HA IDENTIFICADO');</script>";
		echo "<meta http-equiv='Refresh' content='5;url=adminLog.php'>";
	}
?>
	
   </body>
</html>


