<?php

session_start();
	include('cabecera.php');
    include('../php/config.inc');
	if (isset($_SESSION['admin'])) {
?>


<div class="panel panel-info">
        <div class="panel-heading">Lista de Clientes</div>
		
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
			
			$editaaar = "".$fila['hue_id']."','".$fila['hue_nombre']."','".$fila['hue_nombre']."','".$fila['hue_nombre']."','".$fila['hue_nombre']."','".$fila['hue_nombre']."','".$fila['hue_nombre']."";

			echo "<tr>
               
                <td>".$fila['hue_nombre']."</td>
                <td>".$fila['hue_descripcion']."</td>
				<td>".$fila['hue_direccion']."</td>
				<td>".$fila['hue_telefono']."</td>
				<td>".$fila['hue_logo']."</td>
				<td>".$fila['hue_banner']."</td>
				
	
				<td>".$fila['hue_abre']."</td>
				<td>".$fila['hue_cierra']."</td>
				

               
            
                <td>
                  <div class='btn-group'>
                    <button type='button' class='btn btn-danger btn-xs'>Administrar</button>
                    <button type='button' class='btn btn-danger btn-xs dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                      <span class='caret'></span>
                    </button>
                    <ul class='dropdown-menu' role='menu'>
					
							<li><a onclick=Editar('".$editaaar."') >Actualizar</a></li>
						                  
                    </ul>
                  </div>
                </td>
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
                  <input name="abre" class="form-control" required>
                </div>
				
				<div class="form-group">
                  <label>Cierra</label>
                  <input name="cierra" class="form-control" required>
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
                  <input name="categoria" class="form-control" required>
                </div>
				
			            
                
              </div>
              
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" onClick="Ingresar_Cliente(accion); return false">
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
    var accion;
    
    function Nuevo(){
      accion = 'N';
		
	  	  
     
      $('#modal').modal('show');
    }
    function Editar(cedula,nombre,apellido,direccion,telefono,correo,contrasena){
      accion = 'E';
      
      document.frmEquipos.cedula.value = cedula;
      document.frmEquipos.nombre.value = nombre;
      document.frmEquipos.apellido.value = apellido;
	  document.frmEquipos.direccion.value = direccion;
	  document.frmEquipos.telefono.value = telefono;
	  document.frmEquipos.correo.value = correo;
	  document.frmEquipos.contra.value = contrasena;
  
      $('#modal').modal('show');
    }

   </script>