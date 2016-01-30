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
cedula = document.frmCliente.cedula.value;
nombre = document.frmCliente.nombre.value;
apellido = document.frmCliente.apellido.value;
direccion = document.frmCliente.direccion.value;
telefono = document.frmCliente.telefono.value;
correo = document.frmCliente.correo.value;
contra = document.frmCliente.contra.value;

alert(cedula+nombre+apellido);
alert(cedula);
ajax = objetoAjax();
ajax.open("POST", "php/registrar_cliente.php", true);

ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("cedula="+cedula+"&nombre="+nombre+"&apellido="+apellido+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo+"&contra="+contra);

}


