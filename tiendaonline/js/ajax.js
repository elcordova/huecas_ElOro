function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function Registrar_Cliente(){
cedula = document.frmCliente.cedula.value;;	
nombre = document.frmCliente.nombre.value;
apellido = document.frmCliente.apellido.value;
direccion = document.frmCliente.direccion.value;
telefono = document.frmCliente.telefono.value;
email = document.frmCliente.email.value;
contrasena = document.frmCliente.contrasena.value;

alert(cedula+nombre+apellido);

ajax = objetoAjax();
if(accion=='N'){
ajax.open("POST", "php/registrar_cliente.php", true);

ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("cedula="+cedula+"&nombre="+nombre+"&apellido="+apellido+"&direccion="+direccion+"&telefono="+telefono+"&email="+email+"&contrasena="+contrasena);
}
}


