<?php 
session_start();
	include('cabecera.php');
    include('../php/config.inc');
	if (isset($_SESSION['admin'])) { 


	$conexion = oci_connect($usuario,$contrasena,$db);
    if (!$conexion) {
       echo "<script>alert('error al conectar')</script>";
    }

    
?>

<div class="panel panel-info">
        <div class="panel-heading"><h4>Lista de Usuarios</h4></div>
		
        <div class="panel-body">
		
		<button type="button" onclick="Nuevo();" class="btn btn-primary btn-lg" >
          Ingresar
        </button>
		
        <table class="table">
          <thead>
            <tr>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Pedidos Asigandos</th>
              <th>Tipo Usuario</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
		$peticion = "begin GET_ALL_USUARIOS(:cursor_return); end;";
    	$resultado = oci_parse($conexion, $peticion);
    	$curs = oci_new_cursor($conexion);                 
    	//declara el contenedor del cursor devuelto por el procedimeinto GET_ALL_USUARIOS()
    	oci_bind_by_name($resultado, ':cursor_return', $curs, -1,OCI_B_CURSOR);
    	oci_execute($resultado);
    	oci_execute($curs);
			
			
			
			
		while(($fila = oci_fetch_array($curs, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
				

			echo "<tr>
	                <td>".$fila['USERNAME']."</td>
	                <td>".$fila['NOMBRE']."</td>
					<td>".$fila['APELLIDO']."</td>
					<td>".$fila['PEDIDOS_ASIGNADOS']."</td>
					<td>".$fila['TIPO_USUARIO']."</td>
					<td>
						<button type='button' class='btn btn-primary' onclick='editar(".$fila['USU_ID'].");'>EDITAR</button>
						<button type='button' class='btn btn-primary'>";
						if ($fila['ESTADO']=='ACTIVO') {
							echo "DESACTIVAR";
						}else{
							echo "ACTIVAR";
						}


						echo "</button>
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
              <div class="modal-title" >USUARIO</div>
            </div>
            <form role="form" action="" name="frmEquipos">
              <div class="col-lg-12">
			  
				<input type='hidden' name='idusuario' id='idusuario'>
				
                <div class="form-group">
                  <label>USUARIO</label>
                  <input name="usuario" class="form-control" id="username_usu" required>
                </div>

                <div class="form-group">
                  <label>NOMBRE</label>
                  <input name="nombre" class="form-control" id="nombre_usu" required>
                </div>
				
				<div class="form-group">
                  <label>APELLIDO</label>
                  <input name="apellido" class="form-control" id="apellido_usu" required>
                </div>
				
				<div class="form-group">
                  <label>TIPO</label>
                  <select  class="form-control"  name="categoria"  id="tipo_usu" SIZE=1 >
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    <option value="REPARTIDOR">REPARTIDOR</option>
                </select> 
                </div>

				<div class="form-group">
                  <label>CLAVE DE ACCESO</label>
                  <input name="clave"  type="password" class="form-control " id="clave_usu" required>
                </div>  
              </div>
              
            </form>
            <div class="modal-footer">
              <input type="button" class="btn btn-info" onClick="Ingresar_Usuario();" value="GUARDAR" />
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

	include('piepagina.php');
?>

<script type="text/javascript">

function Ingresar_Usuario () {
	$.ajax({
		url:"../php/usuario.php",
		type:"GET",
		dataType:'json',
		data:{
				"USU_ID":$('#idusuario').val(),
				"USERNAME":$('#username_usu').val(),
				"NOMBRE":$('#nombre_usu').val(),
				"APELLIDO":$('#apellido_usu').val(),
				"TIPO_USUARIO":$('#tipo_usu').val(),
				"CONTRA":$('#clave_usu').val()
			},
		success:function(data){
			console.log(data);
			if (data.mensaje.includes("ORA-")) {
				toastr.options={"progressBar": true}
				toastr.error(data.mensaje,'Estado');
			} else{
				toastr.options={"progressBar": true}
				toastr.success(data.mensaje,'Estado');
				limpiar_formulario();
			};

			

		},
		error:function(data, textStatus, errorThrown){
			console.log(data);
			toastr.options={"progressBar": true}
			toastr.error(textStatus,'Estado');
		}	
	});
	
}


function limpiar_formulario(){
	$('#idusuario').val("");
	$('#username_usu').val("");
	$('#nombre_usu').val("")
	$('#apellido_usu').val("");
	$('#tipo_usu').val("");
	$('#clave_usu').val("");
	$('#modal').modal('hide');
}

function Nuevo(){
	$('#modal').modal('show');
	$('#idusuario').val('');
}


function editar(id_user){
	$('#idusuario').val(id_user);
	$('#modal').modal('show');
} 
</script>