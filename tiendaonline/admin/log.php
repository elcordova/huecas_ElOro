<?php session_start();

if(isset($_POST['txtusuario'])){
$nombre= $_POST["txtusuario"];
$pass= $_POST["txtpassword"];
print $nombre;

 if ($nombre=='huecas' && $pass=='eloro') { 
 	$_SESSION['admin']=$nombre;
 	echo '
		<meta http-equiv="refresh" content="1; url=index.php"> 
	';
	
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