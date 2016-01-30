<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

	echo "
		<ul class='nav nav-tabs'>
  <li><a href='hueca.php?id=".$_GET['id']."'>PLATOS</a></li>
  <li><a href='videos.php?id=".$_GET['id']."'>VIDEOS</a></li>
  <li><a href='galeria.php?id=".$_GET['id']."'>GALERIA</a></li>
<li class='active'><a href='#''>COMO LLEGAR</a></li>

		</ul>


	




	";
	
	


?>


<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");

$peticion1="SELECT * FROM hueca Where hue_id=".$_GET['id']." LIMIT 1" ;
$resultado1=mysqli_query($conexion, $peticion1);
while($hueca=mysqli_fetch_array($resultado1)){
	
	echo "<input type='hidden' name='latitud' id='latitud' value=".$hueca['latitud'].">";
	echo "<input type='hidden' name='longitud' id='longitud' value=".$hueca['longitud'].">";
	echo "</br> <div class='container-fluid text-center'>";
	echo "<pre><h4> <strong>".$hueca['hue_nombre']." </strong></h4></pre>";
	echo "</div>";
	
	echo "
	<div class='row center'>
		<div class='col-md-1 text-center'>
		</div>
		<div class='col-md-11 text-center'>
		<div id='pony' name='pony' style='width: 590px; height: 550px;'> </div>
		</div>
	</div>";
	

	
} 
echo "</br> <div class='container-fluid text-center'>";
	echo "<pre></pre>";
	echo "</div>";


mysqli_close($conexion);
?>
<div class="container-fluid row-fluid"></div>
<?php include "php/piedepagina.inc" ?>

<script>
	(function(){
	var content = document.getElementById("geolocation-test");

	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(objPosition)
		{
			var longitud = objPosition.coords.longitude;
			var latitud = objPosition.coords.latitude;
			
			
			
			var directionsDisplay = new google.maps.DirectionsRenderer();
			var directionsService = new google.maps.DirectionsService();
	
	
			var longitud1 = document.getElementById('longitud').value;
			var latitud1 = document.getElementById('latitud').value;
			
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#pony',
				lat: latitud,
				lng: longitud,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			  });
			  
			$(document).ready(function(){
			  muestra([latitud,longitud], [latitud1,longitud1]);
						  
			});  			
			
			
			
			
			
			function muestra (origen, fin) {
				map.drawRoute({
					origin: origen,  // origen en coordenadas anteriores
					destination: fin, // destino en coordenadas del click o toque actual
					travelMode: google.maps.DirectionsTravelMode[$('#modo_viaje').val()],
					unitSystem: 'METRIC',
					provideRouteAlternatives: true,
					strokeColor: '#3B9313',
					strokeOpacity: 0.6,
					strokeWeight: 5,
					});
			};	
			
			map.addMarker({
			  lat: latitud,
			  lng: longitud,
			  title: 'Tu ubicación',
			  icon: 'https://mts.googleapis.com/maps/vt/icon/name=icons/spotlight/spotlight-waypoint-a.png&text=A&psize=16&font=fonts/Roboto-Regular.ttf&color=ff333333&ax=44&ay=48&scale=1',
			  click: function(e) {
				alert('You clicked in this marker');
			  }
			});
			
			map.addMarker({
			  lat: latitud1,
			  lng: longitud1,
			  title: 'Capicua',
			  icon: 'https://mts.googleapis.com/maps/vt/icon/name=icons/spotlight/spotlight-waypoint-b.png&text=B&psize=16&font=fonts/Roboto-Regular.ttf&color=ff333333&ax=44&ay=48&scale=1',
			  click: function(e) {
				alert('You clicked in this marker');
			  }
			});
			
			
			
				
			
		
				
			
			});
			//content.innerHTML = "<p><strong>Latitud:</strong> " + latitud + "</p><p><strong>Longitud:</strong> " + longitud + "</p>";

		}, function(objPositionError)
		{
			switch (objPositionError.code)
			{
				case objPositionError.PERMISSION_DENIED:
					content.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
				break;
				case objPositionError.POSITION_UNAVAILABLE:
					content.innerHTML = "No se ha podido acceder a la información de su posición.";
				break;
				case objPositionError.TIMEOUT:
					content.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
				break;
				default:
					content.innerHTML = "Error desconocido.";
			}
		}, {
			maximumAge: 75000,
			timeout: 15000
		});
	}
	else
	{
		content.innerHTML = "Su navegador no soporta la API de geolocalización.";
	}
	})();
	
	

</script>