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
function Registrar(idE, accion){
cedula = document.frmEquipos.cedula.value;;	
nombre = document.frmEquipos.nombre.value;
apellido = document.frmEquipos.apellido.value;
direccion = document.frmEquipos.direccion.value;
telefono = document.frmEquipos.telefono.value;
email = document.frmEquipos.email.value;


alert(cedula+nombre+apellido);

ajax = objetoAjax();
if(accion=='N'){
ajax.open("POST", "clases/registrar.php", true);
}else if(accion=='E'){
ajax.open("POST", "clases/actualizar.php", true);
}
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("cedula="+cedula+"&nombre="+nombre+"&apellido="+apellido+"&direccion="+direccion+"&telefono="+telefono+"&email="+email)
}


function RegistrarP(idE, accion){
    
      descripcion = document.frmEquipos.descripcion.value;
      stock = document.frmEquipos.stock.value;
	  precioc = document.frmEquipos.precioc.value;
	  preciom = document.frmEquipos.preciom.value;
	  pvp = document.frmEquipos.pvp.value;



ajax = objetoAjax();
if(accion=='N'){
ajax.open("POST", "clases/registrarp.php", true);
}else if(accion=='E'){
ajax.open("POST", "clases/actualizarp.php", true);
}
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("codigo="+idE+"&descripcion="+descripcion+"&stock="+stock+"&precioc="+precioc+"&preciom="+preciom+"&pvp="+pvp)
}


function facturar(idE, accion){
    
      numero = "";
      fecha = document.fechaR.value;
	  subtotal = document.sub.value;
	  iva = document.iva.value;
	  descuento = document.descu.value;
	  pretot = document.pretot.value;



ajax = objetoAjax();
if(accion=='N'){
ajax.open("POST", "clases/registrarf.php", true);
}else if(accion=='E'){
ajax.open("POST", "clases/actualizarp.php", true);
}
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("codigo="+idE+"&descripcion="+descripcion+"&stock="+stock+"&precioc="+precioc+"&preciom="+preciom+"&pvp="+pvp)
}

function Eliminar(idE){
if(confirm("En realizad desea eliminar este registro?")){
ajax = objetoAjax();
ajax.open("POST", "clases/eliminar.php", true);
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('El registro fue eliminado con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("idE="+idE)
}else{
  //Sin acciones
}
}
