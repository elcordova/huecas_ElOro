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

function Ingresar_Cliente(){
cedula = document.frmEquipos.cedula.value;
nombre = document.frmEquipos.nombre.value;
apellido = document.frmEquipos.apellido.value;
direccion = document.frmEquipos.direccion.value;
telefono = document.frmEquipos.telefono.value;
correo = document.frmEquipos.correo.value;
contra = document.frmEquipos.contra.value;

alert(cedula+nombre+apellido+direccion+telefono+correo+contra);

ajax = objetoAjax();


if(accion=='N'){
ajax.open("POST", "../php/ingresar_cliente.php", true);
}else if(accion=='E'){
ajax.open("POST", "../php/actualizar_cliente.php", true);
}

ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
			window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("cedula="+cedula+"&nombre="+nombre+"&apellido="+apellido+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo+"&contra="+contra);

}


