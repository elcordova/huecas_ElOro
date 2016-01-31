<?php

session_start();
	include('cabecera.php');
    include('../php/config.inc');
	if (isset($_SESSION['admin'])) {

echo "
		<ul class='nav nav-tabs'>
  <li class='active'><a href='#'>PEDIDOS POR HUECA</a></li>
  <li><a href='pedidos_estado.php'>PEDIDOS POR ESTADO</a></li>
  <li><a href='pedidos_cliente.php'>PEDIDOS POR CLIENTE</a></li>
  <li><a href='pedidos_plato.php'>PEDIDOS POR PLATO</a></li>
		</ul>";

	$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($conexion, "utf8");
	$peticion1="SELECT * FROM hueca where hue_id IN (SELECT hue_id from plato where pla_id IN (SELECT pla_id from detallepedido where ped_id IN (SELECT ped_id from pedido )))";
	$resultado1=mysqli_query($conexion, $peticion1);
	$cont2=0;
	$cont=0;
	while($hueca=mysqli_fetch_array($resultado1)){
		$cont++;
		$cont2++;
		echo "<div class='panel-group' id='accordion".$cont."'>";
?>
	<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" id="acord"  data-parent="#accordion<?php print($cont);?>" href="#collapse<?php print($cont);?>">
        <?php echo " # ".$hueca['hue_id']." - ".$hueca['hue_nombre']."-"; ?></a>
      </h4>
    </div>
    <div id="collapse<?php print($cont);?>" class="panel-collapse collapse in">
      <div class="panel-body">
      	<?php
      	$peticion2="SELECT * from pedido where ped_id IN (SELECT ped_id from detallepedido where pla_id IN (SELECT pla_id from plato where hue_id = ".$hueca['hue_id'].")) ORDER BY `pedido`.`ped_fecha` DESC";
			$resultado2=mysqli_query($conexion, $peticion2);
			while($pedido=mysqli_fetch_array($resultado2)){
				$cont2++;
				?>
				<div class="panel-group">
  				<div class="panel panel-default">
    			<div class="panel-heading">
      			<h4 class="panel-title">
				<?php
				echo "<a data-toggle='collapse' data-parent='#collapse".$cont."' href='#collapsea".$cont2."'>pedido # ".$pedido['ped_id']." -          ".$pedido['ped_fecha']."        ".$pedido['ped_estado']."</a></h4></div>";
				?>
					<div id='<?php echo "collapsea".$cont2; ?>' class="panel-collapse collapse in">
      					<div>
      					<ul class="list-group">

					<?php
      				$peticion2="SELECT plato.pla_nombre, detallepedido.det_cantidad, plato.pla_precio from detallepedido , plato where detallepedido.pla_id=plato.pla_id and ped_id=".$pedido['ped_id']." and plato.pla_id in( select pla_id from plato where hue_id=".$hueca['hue_id'].")";
						$resultado3=mysqli_query($conexion, $peticion2);
						while($plato=mysqli_fetch_array($resultado3)){
						    
							echo "<li class='list-group-item'>".$plato['pla_nombre']."-".$plato['pla_precio']."-".$plato['det_cantidad']." ->> ".$plato['pla_precio']*$plato['det_cantidad']."</li>";
					 	
								}
					 	?>
					 	</ul>
					 	</div>
					</div>
				</div>
			</div>				
				<?php
			}
      	?>
      </div>
    </div>
  </div>


<?php
echo "</div>";
	}

	
?>







<?php


	}else{

		echo "<script language='javascript'>alert('AUN NO SE HA IDENTIFICADO');</script>";
		echo "<meta http-equiv='Refresh' content='5;url=adminLog.php'>";
	}
?>

<?php include('piepagina.php') ?>
