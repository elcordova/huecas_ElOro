<?php session_start();
	include('cabecera.php');
    include('../php/config.inc');
	if (isset($_SESSION['admin'])) {
?>


<div class="panel panel-info">
        <div class="panel-heading"><h4>Lista de Huecas</h4></div>
		
        <div class="panel-body">
		
		<button type="button" onclick="Nuevo();" class="btn btn-primary btn-lg" >
          Ingresar
        </button>
		
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Logo</th>
              <th>Banner</th>
			  <th>Abre</th>
			  <th>Cierra</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion, "utf8");
			$peticion = "SELECT * FROM hueca";
			$resultado = mysqli_query($conexion, $peticion);
			
			
			
			
			while($fila = mysqli_fetch_array($resultado)) {
				
					
			
			$idd = $fila['hue_id']; 
			$nombree = $fila['hue_nombre'];			
			$descripcionn = $fila['hue_descripcion']; 
			$direccionn = $fila['hue_direccion'];  
			$telefonoo = $fila['hue_telefono'];  
			$horarioo = $fila['hue_horario'];   
			$logoo = $fila['hue_logo'];     
			$bannerr = $fila['hue_banner'];   
			$menuu = $fila['hue_menu'];      
			$videoo = $fila['hue_video'];      
			$abree = $fila['hue_abre'];    
			$cierraa = $fila['hue_cierra'];     
			$diass = $fila['dias'];           
			$latitudd = $fila['latitud'];     
			$longitudd = $fila['longitud'];        
			$catee = $fila['cat_id'];

			echo "<tr>
               
                <td>".$fila['hue_nombre']."</td>
                <td>".$fila['hue_descripcion']."</td>
				<td>".$fila['hue_direccion']."</td>
				<td>".$fila['hue_telefono']."</td>
				<td>".$fila['hue_logo']."</td>
				<td>".$fila['hue_banner']."</td>
				
	
				<td>".$fila['hue_abre']."</td>
				<td>".$fila['hue_cierra']."</td>
		
				

               
            
                
              </tr> ";
			
			}
            
            
            ?>
          </tbody>
        </table>
      </div>

      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="modal-title" >Cliente</div>
            </div>
            <form role="form" action="" name="frmEquipos">
              <div class="col-lg-12">
			  
				<input type='hidden' name='idhueca' id='idhueca'>
				
                <div class="form-group">
                  <label>Nombre</label>
                  <input name="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Descripcion</label>
                  <input name="descripcion" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Direccion</label>
                  <input name="direccion" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Telefono</label>
                  <input name="telefono" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Horario</label>
                  <input name="horario" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Logo</label>
                  <input name="logo" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Banner</label>
                  <input name="banner" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Menu</label>
                  <input name="menu" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Video</label>
                  <input name="video" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Abre</label>
                  
				 
				  <input name="abre" type="text" class="form-control" id="datetimepicker2">
				  
                </div>
				
				<div class="form-group">
                  <label>Cierra</label>
                  
				
				  <input name="cierra" type="text" class="form-control" id="datetimepicker3">
						
				  
                </div>
				
				<div class="form-group">
                  <label>Dias</label>
                  <input name="dias" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Latitud</label>
                  <input name="latitud" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Longitud</label>
                  <input name="longitud" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Categoria</label>
                  <select  class="form-control"  name="categoria"  SIZE=1 >
                    <option value="1">Comida de Mar</option>
                    <option value="2">Piqueo</option>
                    <option value="3">Pizza</option>
					<option value="4">Frutas</option>
                    <option value="5">Comita Tipica</option>
                    <option value="6">Parrilladas</option>
					<option value="7">Helados</option>
                </select> 
                </div>
				
			            
                
              </div>
              
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" onClick="Ingresar_Huecas(accion); return false">
                   Guardar
              </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
            </div>
          </div>
        </div>
      </div>

    </div>

<?php


	}else{

		echo "<script language='javascript'>alert('AUN NO SE HA IDENTIFICADO');</script>";
		echo "<meta http-equiv='Refresh' content='5;url=adminLog.php'>";
	}
?>
<?php include('piepagina.php') ?>


<script type="text/javascript">
    
	

	  $(function() {
		$('#datetimepicker2').datetimepicker({
		 format: 'hh:ii'
		});
		
		$('#datetimepicker3').datetimepicker({
		 format: 'hh:ii'
		});
		
		
	  });
	  
	  	  


	
	var accion;
    
    function Nuevo(){
      accion = 'N';
		
	  document.frmEquipos.idhueca.value = "";
	  document.frmEquipos.nombre.value = "";
      document.frmEquipos.descripcion.value = "";
	  document.frmEquipos.direccion.value = "";
	  document.frmEquipos.telefono.value = "";
	  document.frmEquipos.horario.value = "";
	  document.frmEquipos.logo.value = "";
	  document.frmEquipos.banner.value = "";
	  document.frmEquipos.menu.value = "";
	  document.frmEquipos.video.value = "";
	
	  document.frmEquipos.dias.value = "";
	  document.frmEquipos.latitud.value = "";
	  document.frmEquipos.longitud.value = "";
	  document.frmEquipos.categoria.value = "";
	  	  
     
      $('#modal').modal('show');
    }
    function Editar(id,nombre,descripcion,direccion,telefono,horario,logo,banner,menu,video,abre,cierra,dias,latitud,longitud,categoria){
      accion = 'E';
      
      document.frmEquipos.idhueca.value = id;
	  document.frmEquipos.nombre.value = nombre;
      document.frmEquipos.descripcion.value = descripcion;
	  document.frmEquipos.direccion.value = direccion;
	  document.frmEquipos.telefono.value = telefono;
	  document.frmEquipos.horario.value = horario;
	  document.frmEquipos.logo.value = logo;
	  document.frmEquipos.banner.value = banner;
	  document.frmEquipos.menu.value = menu;
	  document.frmEquipos.video.value = video;
	  document.frmEquipos.abre.value = abre;
	  document.frmEquipos.cierra.value = cierra;
	  document.frmEquipos.dias.value = dias;
	  document.frmEquipos.latitud.value = latitud;
	  document.frmEquipos.longitud.value = longitud;
	  document.frmEquipos.categoria.value = categoria;
	  
  
      $('#modal').modal('show');
    }

   </script>