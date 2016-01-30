<?php

session_start();
	include('cabecera.php');
    include('../php/config.inc');
	if (isset($_SESSION['admin'])) {
?>


<div class="panel panel-info">
        <div class="panel-heading">Lista de Equipos</div>
        <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Correo</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion, "utf8");
			$peticion = "SELECT * FROM cliente";
			$resultado = mysqli_query($conexion, $peticion);
			
			
            
            foreach($resultado as $row){
              ?>
              <tr>
                <td><?php print($row->cli_cedula); ?></td>
                <td><?php print($row->cli_nombre); ?></td>
                <td><?php print($row->cli_apellido); ?></td>
                <td><?php print($row->cli_direccion); ?></td>
				<td><?php print($row->cli_telefono); ?></td>
				<td><?php print($row->cli_correo); ?></td>
				<td><?php print($row->cli_contrasena); ?></td>
            
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-xs">Seleccione</button>
                    <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a onclick="Eliminar('<?php print($row->cedula); ?>');">Eliminar</a></li>
                      <li><a onclick="Editar('<?php print($row->cedula); ?>','<?php print($row->nombre); ?>','<?php print($row->apellido); ?>','<?php print($row->direccion); ?>','<?php print($row->telefono); ?>','<?php print($row->email); ?>');">Actualizar</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <?php
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
              <div class="modal-title" >Proveedor</div>
            </div>
            <form role="form" action="" name="frmEquipos">
              <div class="col-lg-12">
                <div class="form-group"><br>
                  <label>Cedula</label>
                  <input name="cedula" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Nombre</label>
                  <input name="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Apellido</label>
                  <input name="apellido" class="form-control" required>
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
                  <label>Correo</label>
                  <input name="email" class="form-control" required>
                </div>
				
			            
                
              </div>
              
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" onClick="Registrar(idE,accion); return false">
                  <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Grabar
              </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancel</button>
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