<?php session_start();
	include('cabecera.php');
    include('../php/config.inc');
	if (isset($_SESSION['admin'])) {

echo "
		<ul class='nav nav-tabs'>
  <li><a href='pedidosAdmin.php'>PEDIDOS POR HUECA</a></li>
  <li class='active'><a href='#'>PEDIDOS POR ESTADO</a></li>
  <li><a href='pedidos_cliente.php'>PEDIDOS POR CLIENTE</a></li>
		</ul>";

		$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($conexion, "utf8");
	$peticion1="SELECT * from pedido where ped_estado='no servido' and ped_id IN (SELECT ped_id from detallepedido where pla_id IN (SELECT pla_id from plato)) ORDER BY `pedido`.`ped_id` DESC";
	$resultado1=mysqli_query($conexion, $peticion1);
?>
	<div class="panel-group">
  	<div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title">
    <?php
	echo "<a data-toggle='collapse' href='#collapsea'>PEDIDOS POR ATENDER</a></h4></div>";
	?>
	<div id='collapsea' class="panel-collapse collapse in">
     <ul class="list-group">
     <?php 

     while($pedido=mysqli_fetch_array($resultado1)){
		echo "<li class='list-group-item'><a href=pedido.php?ped_id=".$pedido['ped_id'].">".$pedido['ped_id']." realizado el  " .$pedido['ped_fecha']." por: $".$pedido['ped_preciot']. "</a></li> ";
		}
	?>	
	</ul>
	</div>
	</div></div>


<!-- PRESENTANDO  -->

	<div class="panel-group">
  	<div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title">
    <?php

	$peticion2="SELECT * from pedido where ped_estado='servido' and ped_id IN (SELECT ped_id from detallepedido where pla_id IN (SELECT pla_id from plato)) ORDER BY `pedido`.`ped_id` DESC";
	$resultado2=mysqli_query($conexion, $peticion2);





	echo "<a data-toggle='collapse' href='#collapsei'>PEDIDOS ATENDIDOS</a></h4></div>";
	?>
	<div id='collapsei' class="panel-collapse collapse in">
     <ul class="list-group">
     <?php 

     while($pedido1=mysqli_fetch_array($resultado2)){
		echo "<li class='list-group-item'><a href=pedido.php?ped_id=".$pedido1['ped_id'].">".$pedido1['ped_id']." realizado el  " .$pedido1['ped_fecha']." por: $".$pedido1['ped_preciot']. "</a></li> ";
		}
	?>	
	</ul>
	</div>
	</div></div>

	<!--  -->

	<div class="panel-group">
  	<div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title">
    <?php
	echo "<a data-toggle='collapse' href='#collapseu'>ANULADOS</a></h4></div>";
	?>
	<div id='collapseu' class="panel-collapse collapse in">
     <ul class="list-group">
     <?php 

     $peticion3="SELECT * from pedido where ped_estado='anulado' and ped_id IN (SELECT ped_id from detallepedido where pla_id IN (SELECT pla_id from plato)) ORDER BY `pedido`.`ped_id` DESC";
		$resultado3=mysqli_query($conexion, $peticion3);

     while($pedido=mysqli_fetch_array($resultado3)){
		echo "<li class='list-group-item'><a href=pedido.php?ped_id=".$pedido['ped_id'].">".$pedido['ped_id']." realizado el  " .$pedido['ped_fecha']." por: $".$pedido['ped_preciot']. "</a></li> ";
		}
	?>	
	</ul>
	</div>
	</div></div>



<?php
	}else{

		echo "<script language='javascript'>alert('AUN NO SE HA IDENTIFICADO');</script>";
		echo "<meta http-equiv='Refresh' content='2;url=adminLog.php'>";
	}
?>

<?php include('piepagina.php') ?>
