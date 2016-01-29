<?php


$nombre= $_POST["txtusuario"];
$pass= $_POST["txtusuario"];

if ($nombre=='huecas') { 

	session_start();
	$_SESSION['admin']='huecas';
	header('index.php');

 }else{
 	echo "<script type='text'> alert('USUARIO NO AUTORIZADO')</script>";

}   

?>