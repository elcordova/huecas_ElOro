

<script type="text/javascript">
	
function verCliente(nombre, apellido,cedula,correo,direccion,telefono){
	  document.frmCliente.nombre.value=nombre;
      document.frmCliente.apellido.value =apellido;
      document.frmCliente.cedula.value = cedula;
      document.frmCliente.correo.value = correo;
      document.frmCliente.direccion.value = direccion;
      document.frmCliente.telefono.value = telefono;
      $('#modal').modal('show');
}


</script>






<?php


echo "<div class='modal fade' id='modal' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
              <div class='modal-title' >NUEVO USUARIO</div>
            </div>
            <form role='form' action='' name='frmCliente'>
              <div class='col-lg-12'>
                
                <div class='form-group'  ><br>
                  <label>NOMBRES</label>
                  <input name='nombre' class='form-control disabled' required>
                </div>

                <div class='form-group'><br>
                  <label>APELLIDOS</label>
                  <input name='apellido' class='form-control' required>
                </div>
                <div class='row'>
                <div class='form-group col-xs-6'>
                  <label>NUMERO DE CEDULA </label>
                  <input name='cedula' class='form-control' required>
                </div>
                <div class='form-group col-xs-6'>
                  <label>TELEFONO</label>
                  <input name='telefono' class='form-control' required>
                </div>

                </div>
                <div class='form-group'>
                  <label>DIRECCIÓN</label>
                  <input name='direccion' class='form-control' required>
                </div>

                
                <div class='form-group'>
                  <label>CORREO ELECTRONICO</label>
                  <input name='correo' class='form-control' required>
                </div>
                

              </div>
              
            </form>
            <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span>ACEPTAR</button>
            </div>
          </div>
        </div>
      </div>

";







session_start();
	include('cabecera.php');
	if (isset($_SESSION['admin'])) {
	include('../php/config.inc');
	$conexion = oci_connect($usuario,$contrasena,$db);
      if (!$conexion) {
         echo "<script>alert('error al conectar')</script>";
      }
    $peticion= "begin GET_PEDIDO_ID(:datos_pedido,".$_GET['ped_id']."); end;";
		$resultado = oci_parse($conexion, $peticion);
		$curs = oci_new_cursor($conexion);                 
      	oci_bind_by_name($resultado, ':datos_pedido', $curs, -1,OCI_B_CURSOR);
     	oci_execute($resultado);
      	oci_execute($curs);		
	echo "
		<div class='panel panel-default'>
  <div class='panel-heading'>DATOS DE PEDIDO # ".$_GET['ped_id']."</div>
  <div class='panel-body'>
	";



// onclick='verCliente('".$fila['cli_nombre']."','".$fila['cli_apellido']."',
// 			'".$fila['cli_cedula']."','".$fila['cli_correo']."','".$fila['cli_direccion']."',
// 			'".$fila['cli_telefono']."');'






	while(($fila = oci_fetch_array($curs, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
    ?>
		<div class="col-xs-3"><h4>Pedido realizado por:</h4>
		<h3>
			<?php echo $fila[5]->load(),$fila[6]->load(); ?></h3></div>
		<div class="col-xs-3"><h4>con C.I. : </h4><h3><?php echo($fila[2]);?></h3></div>
		<div class="col-xs-3"><h4>el dia : </h4><h3><?php echo($fila[1]);?></h3></div>
    <div class="col-xs-3"><h4>Estado : </h4><h3><?php echo($fila[3]);?></h3></div>     
     <div class="col-xs-6"><button class="btn btn-inverse" 
     onclick="verCliente('<?php echo($fila[5]->load());?>',
					     '<?php echo($fila[6]->load());?>',
					     '<?php echo($fila[2]);?>',
					     '<?php echo($fila[7]);?>',
					     '<?php echo($fila[8]->load());?>',
					     '<?php echo($fila[9]);?>');">
      <a>DETALLE DE CLIENTE</a></button></div>
    
  <?php
    echo "<div class='dropdown col-xs-6'>
  <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Cambiar a estado<span class='caret'></span></button>
  <ul class='dropdown-menu'>
    <li><a href='anulado.php?id=".$_GET['ped_id']."'>anulado</a></li>
    <li><a href='servido.php?id=".$_GET['ped_id']."'>servido</a></li>
    <li><a href='noservido.php?id=".$_GET['ped_id']."'>no servido</a></li>
  </ul>
</div>";
  
	}
	echo "</div></div>"	;
	echo "
		<div class='panel panel-default'>
  <div class='panel-heading'>DETALLE DE PEDIDO # ".$_GET['ped_id']."</div>
  <div class='panel-body'>";
	
	echo "<table>";

 
	$peticion = "begin GET_PLATOS_PEDIDO(:datos_platos,".$_GET['ped_id']."); end;";
	$resultado = oci_parse($conexion, $peticion);
		$curs = oci_new_cursor($conexion);                 
      	oci_bind_by_name($resultado, ':datos_platos', $curs, -1,OCI_B_CURSOR);
     	oci_execute($resultado);
      	oci_execute($curs);		
	echo "<div class='table-responsive'>
<table class='text-center table table-hover'>
    <thead>
        <tr>
            <th class='text-center'>#</th>
            <th class='text-center'>hueca</th>
            <th class='text-center'>nombre de plato</th>
            <th class='text-center'>Precio U.</th>
            <th class='text-center'>Cantidad</th>
            <th class='text-center'>Subtotal</th>
        </tr>
    </thead>
    <tbody class=text-center>";
    $suma=0;
	$cont=0;
	while(($fila = oci_fetch_array($curs, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
		$cont++;
		echo "<tr>
            <td>".$cont."</td>
            <td>".$fila['HUE_NOMBRE']."</td>
            <td>".$fila['PLA_NOMBRE']."</td>
            <td>".$fila['PLA_PRECIO']."</td>
            <td>".$fila['DET_CANTIDAD']."</td>
            <td>".$fila['PLA_PRECIO']*$fila['DET_CANTIDAD']."</td>
            
        </tr>";
        $suma+=$fila['PLA_PRECIO']*$fila['DET_CANTIDAD'];

		}	
		echo "<td></td><td></td><td></td><td></td><td></td><td><h3> Total del pedido: ".$suma."</h3></td>";
		echo "</tbody></table>";


	

	}else{

		echo "<script language='javascript'>alert('AUN NO SE HA IDENTIFICADO');</script>";
		echo "<meta http-equiv='Refresh' content='2;url=adminLog.php'>";
	}
?>

<?php include('piepagina.php') ?>
   
<div class="text-right"></div>