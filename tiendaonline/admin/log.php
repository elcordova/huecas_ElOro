<?php

if(isset($_POST['txtusuario'])){
$nombre= $_POST["txtusuario"];
$pass= $_POST["txtusuario"];
print $nombre;

 if ($nombre=='huecas') { 
 	session_start();
 	$_SESSION['admin']='huecas';
 	echo '
		<meta http-equiv="refresh" content="5; url=index.php"> 
	';


  }else{
  	echo "<script lenguage='javascript'> alert('USUARIO NO AUTORIZADO');</script>";

 }   
}else{
	echo '
		<meta http-equiv="refresh" content="5; url=adminLog.php"> 
	';
	}
?>