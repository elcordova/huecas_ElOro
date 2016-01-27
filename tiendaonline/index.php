<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM hueca";
$resultado = mysqli_query($conexion, $peticion);

	

while($fila = mysqli_fetch_array($resultado)) {
	echo "<div class='row'>";
	echo "<div class='col-md-6'>";
	echo "<img src='galeria/logos/".$fila['hue_logo']."' width=200px   class='img-responsive'   >   ";
	
	echo "<input type='hidden' name='hora2' id='hora2' value=".$fila['hue_abre'].">";
	echo "<input type='hidden' name='hora3' id='hora3' value=".$fila['hue_cierra'].">";
	
	echo "</div><div class='col-md-6'>";
	echo "<a href='hueca.php?id=".$fila['hue_id']."' class='text-center'><h3>".$fila['hue_nombre']."</h3></a>";

	echo "<p>Horario de Atencion: ".$fila['hue_horario']."</p>";
	
	echo "<style type='text/css'>#countdown_container{font-size:13px;width:200px;height:160px;}.countdown_square_container{color:#333;float:left;}.countdown_number{-webkit-box-shadow:0px 5px 10px 0px #444;box-shadow:0px 5px 10px 0px #444;-webkit-border-radius:10px 10px 10px 10px;border-radius:10px 10px 10px 10px;background:#FFF;width:50px;height:65px;font-size:30px;text-align:center;padding-top:15px;}.countdown_number_name{margin-top:10px;font-size:11px;text-transform:uppercase;text-align:center;text-shadow:1px 1px 0px #fff;}#countdown_toppart{height:115px;width:210px;margin:0px auto;}#countdown_bottompart{text-align:center;font-size:16px;text-shadow:1px 1px 0px #fff;max-height:55px;max-width:200px;overflow:hidden;}</style>";
	
	echo "<div id='cart_cerrado' class='round5 carrito-cerrado'>
			
			
			<div class='add-info'>
				 
				<p style='color:#D06E6D; font-size: 17px; padding-top: 10px;'>Este establecimiento se encuentra cerrado.</p>
								<p style='color:#EBADAC;'>ABRE EN</p>
								<div id='countdown_container'><div id='countdown_toppart'><div class='countdown_square_container'><div class='countdown_number' id='countdown_days'></div><div class='countdown_number_name'>Days</div></div><div class='countdown_square_container'><div class='countdown_number' id='countdown_hours'></div><div class='countdown_number_name'>Hours</div></div><div class='countdown_square_container'><div class='countdown_number' id='countdown_mins'></div><div class='countdown_number_name'>Mins</div></div><div class='countdown_square_container'><div class='countdown_number' id='countdown_secs'></div><div class='countdown_number_name'>Secs</div></div></div></div>";
		
				
		echo "</div>";
			
	echo "</div>";
	
	
	echo "</div>";
	echo "</div>";
	
	

}



mysqli_close($conexion);

?>

<script type="text/javascript">

	var hora1;
	var hora2 = document.getElementById('hora2').value;
	var hora3 = document.getElementById('hora3').value;
	
	var timediff;

	window.onload=function() {
			startTime();
	}
	
	
	
	
	function startTime(){ 
	today=new Date(); 
	h=today.getHours(); 
	m=today.getMinutes(); 
	s=today.getSeconds(); 
	m=checkTime(m); 
	s=checkTime(s); 
	hora1 = h+":"+m;
	
	alert(hora1);
	
	z = CompararHoras(hora1,hora2,hora3);
	
	
	} 
	function checkTime(i) {
		if (i<10) {
			i="0" + i;
			}
			return i;
	} 
	
	

	
	function CompararHoras(hora1,hora2 , hora3) { 
     
		var arHora1 = hora1.split(":"); 
		var arHora2 = hora2.split(":");
		var arHora3 = hora3.split(":");	
		 
		// Obtener horas y minutos (hora 1) 
		var hh1 = parseInt(arHora1[0],10); 
		var mm1 = parseInt(arHora1[1],10); 

		// Obtener horas y minutos (hora 2) 
		var hh2 = parseInt(arHora2[0],10); 
		var mm2 = parseInt(arHora2[1],10); 
		
		var hh3 = parseInt(arHora3[0],10); 
		var mm3 = parseInt(arHora3[1],10); 
		
		alert(hh1+" "+hh2+" "+hh3);

		// Comparar 
		if (hh3 < hh1 > hh2){ 
			alert ("abierto"); 
		}else {
			alert ("cerrado");
			
			countdown_UpdateCount();
			
			alert(hh2);
			
				var countdown_dateFuture=new Date(2016,0,27,hh2,0,0);
				function countdown_UpdateCount(){
					 var dateNow=new Date();
					 
					 timediff=Math.abs(countdown_dateFuture.getTime() - dateNow.getTime());
					 alert(timediff);
					 delete dateNow;
					 if(timediff<0){
						 
						 document.getElementById('countdown_container').style.display="none";
						 }else {
							 
							 days=0;
							 hours=0;
							 mins=0;
							 secs=0;
							 out="";
							 timediff=Math.floor(timediff/1000);
							 days=Math.floor(timediff/86400);
							 timediff=timediff % 86400;
							 hours=Math.floor(timediff/3600);
							 timediff=timediff % 3600;
							 mins=Math.floor(timediff/60);
							 timediff=timediff % 60;
							 secs=Math.floor(timediff);
							 if(document.getElementById('countdown_container')){
								 document.getElementById('countdown_days').innerHTML=days;
								 document.getElementById('countdown_hours').innerHTML=hours;
								 document.getElementById('countdown_mins').innerHTML=mins;
								 document.getElementById('countdown_secs').innerHTML=secs;
							}
								 setTimeout("countdown_UpdateCount()", 1000);
						}
					}
					
					function getTime(zone, success) {
						var url = 'http://json-time.appspot.com/time.json?tz=' + zone,
							ud = 'json' + (+new Date());
						window[ud]= function(o){
							success && success(new Date(o.datetime));
						};
						document.getElementsByTagName('head')[0].appendChild((function(){
							var s = document.createElement('script');
							s.type = 'text/javascript';
							s.src = url + '&callback=' + ud;
							return s;
						})());
					}
				
				
			}
	}

	
	

 
	
	
	
	 
</script>


	


<?php include "php/piedepagina.inc" ?>
<button class="img-responsive"></button>