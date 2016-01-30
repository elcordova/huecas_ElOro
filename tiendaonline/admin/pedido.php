

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
	$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($conexion, "utf8");
	$peticion = "SELECT pedido.ped_id,pedido.ped_fecha,cliente.cli_cedula, pedido.ped_preciot, cliente.cli_nombre, cliente.cli_apellido,cliente.cli_correo, cliente.cli_direccion, cliente.cli_telefono FROM pedido,cliente WHERE cliente.cli_cedula=pedido.cli_cedula and pedido.ped_id='".$_GET['ped_id']."' and pedido.ped_estado='por_atender'";
	$resultado = mysqli_query($conexion, $peticion);
	echo "
		<div class='panel panel-default'>
  <div class='panel-heading'>DATOS DE PEDIDO # ".$_GET['ped_id']."</div>
  <div class='panel-body'>
	";



// onclick='verCliente('".$fila['cli_nombre']."','".$fila['cli_apellido']."',
// 			'".$fila['cli_cedula']."','".$fila['cli_correo']."','".$fila['cli_direccion']."',
// 			'".$fila['cli_telefono']."');'






	while($fila = mysqli_fetch_array($resultado)) {
		echo "<span class='col-xs-3'><h3>Pedido realizado por:</h3><h2>".$fila['cli_nombre']." ".$fila['cli_apellido']."</h2></span>";
		echo "<span class='col-xs-3'><h3>con C.I. : </h3><h2>".$fila['cli_cedula']."</h2></span>";
		echo "<span class='col-xs-3'><h3>el dia : </h3><h2>".$fila['ped_fecha']."</h2></span>";
		echo "<span class='col-xs-3'><button class='btn btn-inverse' onclick=verCliente('".$fila['cli_nombre']."','".$fila['cli_apellido']."','".$fila['cli_cedula']."','".$fila['cli_correo']."','".$fila['cli_direccion']."','".$fila['cli_telefono']."')>
			<a>detalles</a></button></span>";

	}
	echo "</div></div>"	;
	echo "
		<div class='panel panel-default'>
  <div class='panel-heading'>DATOS DE PEDIDO # ".$_GET['ped_id']."</div>
  <div class='panel-body'>";
	
	echo "<table>";
	
	$peticion = "SELECT plato.pla_id,hueca.hue_nombre,plato.pla_nombre,plato.pla_precio,detallepedido.det_cantidad FROM detallepedido ,plato,hueca WHERE plato.hue_id=hueca.hue_id and detallepedido.pla_id=plato.pla_id and detallepedido.ped_id='".$_GET['ped_id']."'";
	$resultado = mysqli_query($conexion, $peticion);
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
	while($fila = mysqli_fetch_array($resultado)) {
		$cont++;
		echo "<tr>
            <td>".$cont."</td>
            <td>".$fila['hue_nombre']."</td>
            <td>".$fila['pla_nombre']."</td>
            <td>".$fila['pla_precio']."</td>
            <td>".$fila['det_cantidad']."</td>
            <td>".$fila['pla_precio']*$fila['det_cantidad']."</td>
            
        </tr>";
        $suma+=$fila['pla_precio']*$fila['det_cantidad'];

		}	
		echo "<td></td><td></td><td></td><td></td><td></td><td><h3> Total del pedido: ".$suma."</h3></td>";
		echo "</tbody></table>";


	

	}else{

		echo "<script language='javascript'>alert('AUN NO SE HA IDENTIFICADO');</script>";
		echo "<meta http-equiv='Refresh' content='5;url=adminLog.php'>";
	}
?>

<?php include('piepagina.php') ?>
   
