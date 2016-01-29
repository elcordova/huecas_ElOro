<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>

<?php
		$suma=0;
		echo "<div class='row'>";
if(isset($_SESSION['carrito'])){
	$datos=$_SESSION['carrito'];
		echo "<div class='panel panel-default'>";
		echo "<div class='panel-heading'>";
		echo "<h3 class='strong text-center'>CARRITO DE COMIDA </h3>";
		echo "</div>";
		
		
		for($i = 0;$i< count($datos);$i++){
			echo "<div class='panel-body'>";
		
			echo "<div class='plato row center'>";
			echo "<div class='center col-xs-12 col-sm-12'><h2 class='strong text-center'>Nombre del plato: ".$datos[$i]['Nombre']." </h3></div>";	
			echo "<div class='text-center col-xs-12 col-sm-12'><img src='galeria/platos/".$datos[$i]['Foto']."' width=200px   class='img-circle center'   ></div>";
			echo "<div class='col-xs-12 col-sm-12'><h4 class='strong text-center'>Precio por unidad: ".$datos[$i]['Precio']." </h3></div>";
			echo "<div class='center col-xs-12 col-sm-12'><h4 class='strong text-center'>Cantidad: 
			<input type='text' class='cantidad text-center' value='".$datos[$i]['Cantidad']."';
			data-precio='".$datos[$i]['Precio']."'
			data-id='".$datos[$i]['Id']."'
			></h3></div>";
			echo "<div class='divisor center col-xs-12 col-sm-12'><h3 class='subtotal strong text-center'>Subtotal: ".$datos[$i]['Precio']*$datos[$i]['Cantidad']." </h3></div>";
			$suma += $datos[$i]['Precio']*$datos[$i]['Cantidad'];
			echo "</div>";
			echo "</div>";

			}
		
		echo "<div class='text-center col-xs-12 col-sm-12'><h2 class='strong' id='total'>Total: ".$suma." </h2></div>";
		
echo "<div class='panel-body'>";
echo "<boton class='btn'><a href='confirmar.php'>GENERAR PEDIDOO</a></boton>";
echo "</div>";
echo "</div>";
		
}else{
	echo "<h2 class='text-center'>Sin platos en su lista</h2>";

}
echo "</div>";

	
?>


<?php include "php/piedepagina.inc" ?>
