<?php include "config.inc" ?>

<?php
$jsondata = array();
error_reporting(0);
$conexion = oci_connect($usuario,$contrasena,$db);
if (!$conexion) {
    $e = oci_error();
    $jsondata=array('mensaje'=>$e['message']);
}else{
	
	if($_GET['USU_ID']!='') {
		$jsondata=array('mensaje'=>' USUARIO EDITADO');
		//insertando_nuevo_usuario
	}else{
		$jsondata=array('mensaje'=>' ingresando');
		$peticion = 	"begin USUARIO_ADD('".$_GET['NOMBRE']."','".$_GET['APELLIDO']."','".$_GET['TIPO_USUARIO'].
					"','".$_GET['CONTRA']."','".$_GET['USERNAME']."',:id_return); end;";
		$resultado = oci_parse($conexion, $peticion);
		$id_resp='';
		oci_bind_by_name($resultado, ':id_return', $id_resp);
		$r=oci_execute($resultado);
		if(!$r){
			$e = oci_error($resultado);
			$texto=str_replace('"','-',$e['message']);
			$jsondata=array('mensaje'=>($texto));
			1/0;
			
		}
		else{

		$jsondata=array('mensaje'=>'NUEVO USUARIO INGRESADO   '.$id_resp);	
		}
		

	}
}
	
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_FORCE_OBJECT);



?>