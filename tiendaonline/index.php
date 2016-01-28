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
	echo "<input type='hidden' name='dias' id='dias' value=".$fila['dias'].">";
	
	echo "</div><div class='col-md-6'>";
	echo "<a href='hueca.php?id=".$fila['hue_id']."' class='text-center'><h3>".$fila['hue_nombre']."</h3></a>";

	echo "<p>Horario de Atencion: ".$fila['hue_horario']."</p>";
	
	echo "<style type='text/css'>#countdown_container{font-size:13px;width:200px;height:160px;}.countdown_square_container{color:#333;float:left;}.countdown_number{-webkit-box-shadow:0px 5px 10px 0px #444;box-shadow:0px 5px 10px 0px #444;-webkit-border-radius:10px 10px 10px 10px;border-radius:10px 10px 10px 10px;background:#FFF;width:50px;height:65px;font-size:30px;text-align:center;padding-top:15px;}.countdown_number_name{margin-top:10px;font-size:11px;text-transform:uppercase;text-align:center;text-shadow:1px 1px 0px #fff;}#countdown_toppart{height:115px;width:210px;margin:0px auto;}#countdown_bottompart{text-align:center;font-size:16px;text-shadow:1px 1px 0px #fff;max-height:55px;max-width:200px;overflow:hidden;}</style>";
	
	echo "<div id='cart_cerrado' class='round5 carrito-cerrado'>
			
			
			<div class='add-info'>
				 
				<p style='color:#D06E7D; font-size: 17px; padding-top: 10px;'>La hueca se encuentra cerrada</p>
								<p style='color:#EBADAB;'>ABRE EN:</p>
								<div id='countdown_container'><div id='countdown_toppart'><div class='countdown_square_container'><div class='countdown_number' id='countdown_days'></div><div class='countdown_number_name'>Dias</div></div><div class='countdown_square_container'><div class='countdown_number' id='countdown_hours'></div><div class='countdown_number_name'>Horas</div></div><div class='countdown_square_container'><div class='countdown_number' id='countdown_mins'></div><div class='countdown_number_name'>Min</div></div><div class='countdown_square_container'><div class='countdown_number' id='countdown_secs'></div><div class='countdown_number_name'>Seg</div></div></div></div>";
		
				
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
		if (hh1 >= hh2 && hh1 <= hh3){ 
		 
		}else {
			
			
			fecha=new Date();
			ano = fecha.getFullYear();
			mes = fecha.getMonth();
			dia = fecha.getDate() + 1;
			diaa = fecha.getDay();
			alert(diaa);
			
			var diasMes = new Array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
			var diaMaximo = diasMes[mes];
			
			var dias = document.getElementById('dias').value;
			
			var rangodias = dias.split("-");	
		 
		// Obtener horas y minutos (hora 1) 
			var inicial = parseInt(rangodias[0],10);
			var finall = parseInt(rangodias[1],10); 			
			
			alert("ini"+inicial);
			alert("fin"+finall);
			
			if(dia > diaMaximo){
				mes = mes + 1;
				dia = 1
				if (diaa >= finall){ 
				//alert("priemro"+ano+" "+mes+" "+dia);
					var diferencia = 7 - finall;
					dia = dia + diferencia;
					countdown_dateFuture=new Date(ano,mes,dia,hh2,0,0);
					countdown_UpdateCount();
				}else{
					countdown_dateFuture=new Date(ano,mes,dia,hh2,0,0);
					countdown_UpdateCount();
					
				}
			}else{
				//alert("segundo"+ano+" "+mes+" "+dia);
				if (diaa >= finall){ 
				//alert("priemro"+ano+" "+mes+" "+dia);
					var diferencia = 7 - finall;
					dia = dia + diferencia;
					countdown_dateFuture=new Date(ano,mes,dia,hh2,0,0);
					countdown_UpdateCount();
				}else{
					countdown_dateFuture=new Date(ano,mes,dia,hh2,0,0);
					countdown_UpdateCount();
					
				}
			}
			
			
			
			
							
								
		}
	}

	
	function countdown_UpdateCount(){
				dateNow=new Date();
				timediff=Math.abs(countdown_dateFuture.getTime() - dateNow.getTime());
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

 
	
	
	
	 
</script>


	


<?php include "php/piedepagina.inc" ?>
<button class="img-responsive"></button>