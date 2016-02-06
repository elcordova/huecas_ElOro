<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>

<?php 
		$suma=0;
		echo "<div class='row'>";
if(isset($_SESSION['carrito'])){
	$datos=$_SESSION['carrito'];
		echo "<div class='panel panel-default'>";
		echo "<div class='panel-heading'>";
		echo "<h4 class='strong text-center'><b>CARRITO DE COMIDA </b></h4>";
		echo "</div>";
		
		
		for($i = 0;$i< count($datos);$i++){
			echo "<div class='panel-body'>";
		
			echo "<div class='plato row center'>";
			echo "<div class='center col-xs-12 col-sm-12'><h4 class='strong text-center'><b>Nombre del plato:</b> ".$datos[$i]['Nombre']." </h4></div>";	
			echo "<div class='text-center col-xs-12 col-sm-12'><img src='galeria/platos/".$datos[$i]['Foto']."' width=200px   class='img-circle center'   ></div>";
			echo "<div class='col-xs-12 col-sm-12'><h4 class='strong text-center'><b>Precio por unidad:</b> ".$datos[$i]['Precio']." </h4></div>";
			echo "<div class='center col-xs-12 col-sm-12'><h4 class='strong text-center'><b>Cantidad: </b>
			<input type='text' class='cantidad text-center' value='".$datos[$i]['Cantidad']."';
			data-precio='".$datos[$i]['Precio']."'
			data-id='".$datos[$i]['Id']."'
			></h4></div>";
			echo "<div class='divisor center col-xs-12 col-sm-12'><h4 class='subtotal strong text-center'><b>Subtotal:</b> ".$datos[$i]['Precio']*$datos[$i]['Cantidad']." </h4></div>";
			$suma += $datos[$i]['Precio']*$datos[$i]['Cantidad'];
			echo "</div>";
			echo "</div>";

			}
		
		echo "<div class='text-center col-xs-12 col-sm-12'><h4 class='strong' id='total'><b>Total:</b> ".$suma." </h4></div>";
		
echo "<div class='panel-body'>";
echo "<button  class='btn'><a href='confirmar.php'>GENERAR PEDIDO</a></button>";
echo "</div>";
echo "</div>";
		
}else{
	echo "
	<div class='row center'>
	<div class='col-md-12 text-center'>
		<p><strong><h4> Sin platos en el Carrito </h4></strong> </p>
		</div>
		</div>";

}
echo "</div>";

	
?>


<?php include "php/piedepagina.inc" ?>
