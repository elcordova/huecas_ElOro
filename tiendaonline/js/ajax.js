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

function Ingresar_Cliente(accion){
cedula = document.frmEquipos.cedula.value;
nombre = document.frmEquipos.nombre.value;
apellido = document.frmEquipos.apellido.value;
direccion = document.frmEquipos.direccion.value;
telefono = document.frmEquipos.telefono.value;
correo = document.frmEquipos.correo.value;
contra = document.frmEquipos.contra.value;



ajax = objetoAjax();

alert(accion);
if(accion=='N'){
ajax.open("POST", "../php/ingresar_cliente.php", true);
}else if(accion=='E'){
ajax.open("POST", "../php/actualizar_cliente.php", true);
alert(cedula+nombre+apellido+direccion+telefono+correo+contra);
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

function Ingresar_Huecas(accion){


	id = document.frmEquipos.idhueca.value;
	nombre = document.frmEquipos.nombre.value;
    descripcion = document.frmEquipos.descripcion.value;
	direccion = document.frmEquipos.direccion.value;
	telefono = document.frmEquipos.telefono.value;
	horario = document.frmEquipos.horario.value;
	logo = document.frmEquipos.logo.value;
	banner = document.frmEquipos.banner.value;
	menu = document.frmEquipos.menu.value;
	video = document.frmEquipos.video.value;
	abre = document.frmEquipos.abre.value;
	cierra = document.frmEquipos.cierra.value;
	dias = document.frmEquipos.dias.value;
	latitud = document.frmEquipos.latitud.value;
	longitud = document.frmEquipos.longitud.value;
	categoria = document.frmEquipos.categoria.value;


ajax = objetoAjax();

alert(accion);
if(accion=='N'){
ajax.open("POST", "../php/ingresar_huecas.php", true);
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
ajax.send("id="+id+"&nombre="+nombre+"&descripcion="+descripcion+"&direccion="+direccion+"&telefono="+telefono+"&horario="+horario+"&logo="+logo+"&banner="+banner+"&menu="+menu+"&video="+video+"&abre="+abre+"&cierra="+cierra+"&dias="+dias+"&latitud="+latitud+"&longitud="+longitud+"&categoria="+categoria);

}


