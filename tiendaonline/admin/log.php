<?php

if(isset($_POST['txtusuario'])){
$nombre= $_POST["txtusuario"];
$pass= $_POST["txtpassword"];
print $nombre;

 if ($nombre=='huecas') { 
 

 	session_start();
 	$_SESSION['admin']=$nombre;
 	echo '
		<meta http-equiv="refresh" content="1; url=index.php"> 
	';
	print $pass;

  }else{
  	echo "<script lenguage='javascript'> alert('USUARIO NO AUTORIZADO');</script>";
  	echo "<meta http-equiv='Refresh' content='1;url=adminLog.php'>";

 }   
}else{
	echo '
		<meta http-equiv="refresh" content="1; url=adminLog.php"> 
	';
	}
?>