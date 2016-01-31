

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
	$con = new PDO('mysql:host='.$servidor.';dbname='.$basededatos, $usuario, $contrasena);
	$peticion = "SELECT pedido.ped_id,pedido.ped_fecha,cliente.cli_cedula, pedido.ped_estado, pedido.ped_preciot, cliente.cli_nombre, cliente.cli_apellido,cliente.cli_correo, cliente.cli_direccion, cliente.cli_telefono FROM pedido,cliente WHERE cliente.cli_cedula=pedido.cli_cedula and pedido.ped_id='".$_GET['ped_id']."'";
	$stmt = $con->prepare($peticion);
  $result = $stmt->execute();
  $filas = $stmt->fetchAll(\PDO::FETCH_OBJ);
	echo "
		<div class='panel panel-default'>
  <div class='panel-heading'>DATOS DE PEDIDO # ".$_GET['ped_id']."</div>
  <div class='panel-body'>
	";



// onclick='verCliente('".$fila['cli_nombre']."','".$fila['cli_apellido']."',
// 			'".$fila['cli_cedula']."','".$fila['cli_correo']."','".$fila['cli_direccion']."',
// 			'".$fila['cli_telefono']."');'






	foreach($filas as $fila) {
    ?>
		<div class="col-xs-3"><h4>Pedido realizado por:</h4><h3><?php print($fila->cli_nombre); print($fila->cli_apellido); ?></h3></div>
		<div class="col-xs-3"><h4>con C.I. : </h4><h3><?php print($fila->cli_cedula);?></h3></div>
		<div class="col-xs-3"><h4>el dia : </h4><h3><?php print($fila->ped_fecha);?></h3></div>
    <div class="col-xs-3"><h4>Estado : </h4><h3><?php print($fila->ped_estado);?></h3></div>     
     <div class="col-xs-6"><button class="btn btn-inverse" onclick="verCliente('<?php print($fila->cli_nombre);?>','<?php print($fila->cli_apellido);?>','<?php print($fila->cli_cedula);?>','<?php print($fila->cli_correo);?>','<?php print($fila->cli_direccion);?>','<?php print($fila->cli_telefono);?>');">
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
	$conexion1 = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
  mysqli_set_charset($conexion, "utf8");
	$peticion = "SELECT plato.pla_id,hueca.hue_nombre,plato.pla_nombre,plato.pla_precio,detallepedido.det_cantidad FROM detallepedido ,plato,hueca WHERE plato.hue_id=hueca.hue_id and detallepedido.pla_id=plato.pla_id and detallepedido.ped_id='".$_GET['ped_id']."'";
	$resultado2 = mysqli_query($conexion1, $peticion);
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
	while($fila = mysqli_fetch_array($resultado2)) {
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
		echo "<meta http-equiv='Refresh' content='2;url=adminLog.php'>";
	}
?>

<?php include('piepagina.php') ?>
   
<div class="text-right"></div>