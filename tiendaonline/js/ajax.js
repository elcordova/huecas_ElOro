
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
var bandera="S";

cedula = document.frmCliente.cedula.value;
nombre = document.frmCliente.nombre.value;
apellido = document.frmCliente.apellido.value;
direccion = document.frmCliente.direccion.value;
telefono = document.frmCliente.telefono.value;
correo = document.frmCliente.correo.value;
contra = document.frmCliente.contra.value;
ccontra = document.frmCliente.c_contra.value;
val = document.frmCliente.cedulaval.value;

otra = val.replace("[","");
otra1 = otra.replace("]","");

ya = otra1.split(",");


		
				
if(validar(cedula,nombre,apellido,direccion,telefono,correo,contra,ccontra,bandera,ya)){

ajax = objetoAjax();
ajax.open("POST", "php/registrar_cliente.php", true);

ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//alert('Los datos fueron guardados con exito!');
      window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("cedula="+cedula+"&nombre="+nombre+"&apellido="+apellido+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo+"&contra="+contra);

}

}


function validar(cedula,nombre,apellido,direccion,telefono,correo,contra,ccontra,bandera,ya){
	
			
	
				var v1 = nombre;
                var v2 = apellido;
                var v3 = direccion;
                var v4 = telefono;
                var v5 = correo;
				var v6 = contra;
                var v7 = ccontra;
				var v8 = cedula;
                if( v1 == null || v1.length == 0 || /^\s+$/.test(v1) || v2 == null || v2.length == 0 || /^\s+$/.test(v2) || v3 == null || v3.length == 0 || /^\s+$/.test(v3) || v4 == null || v4.length == 0 || /^\s+$/.test(v4)  || v5 == null || v5.length == 0 || /^\s+$/.test(v5) || v6 == null || v6.length == 0 || /^\s+$/.test(v6) || v7 == null || v7.length == 0 || /^\s+$/.test(v7) || v8 == null || v8.length == 0 || /^\s+$/.test(v8)) {
                    var box = bootbox.alert("Todos los campos son obligatorios");
                                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                                    
                    
					return false;
				}
			var espacios = false;
			var cont = 0
			while (!espacios && (cont < v6.length)) {
			  if (v6.charAt(cont) == " ")
				espacios = true;
			  cont++;
			}
			 
			if (espacios) {
			  
			  var box = bootbox.alert("La contraseña no puede contener espacios en blanco");
                                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
			  return false;
			}

			if (v6 != v7) {
			  var box = bootbox.alert("La contraseñas no coinciden");
                                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
			  
			  return false;
			} 
	
	
	for(var i = 0; i < ya.length ; i++){
		cedulacam = '"'+cedula+'"';
		
		if(cedulacam==ya[i]){
			var box = bootbox.alert("La cedula ya existe");
                                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
			return false;
		}
		
	}
	
	
	if(cedula.length == 10){
                    if(cedula==2222222222){
                        var box = bootbox.alert("No es un numero de cedula");
                                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                                  
                        return false;
                    }
                    //Obtenemos el digito de la region que sonlos dos primeros digitos
                    var digito_region = cedula.substring(0,2);
                    //Pregunto si la region existe ecuador se divide en 24 regiones
                    if( digito_region >= 1 && digito_region <=24 ){
                        // Extraigo el ultimo digito
                        var ultimo_digito = cedula.substring(9,10);
                        //Agrupo todos los pares y los sumo
                        var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));
                        //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
                        var numero1 = cedula.substring(0,1);
                        var numero1 = (numero1 * 2);
                        if( numero1 > 9 ){ var numero1 = (numero1 - 9); }
                        var numero3 = cedula.substring(2,3);
                        var numero3 = (numero3 * 2);
                        if( numero3 > 9 ){ var numero3 = (numero3 - 9); }
                        var numero5 = cedula.substring(4,5);
                        var numero5 = (numero5 * 2);
                        if( numero5 > 9 ){ var numero5 = (numero5 - 9); }
                        var numero7 = cedula.substring(6,7);
                        var numero7 = (numero7 * 2);
                        if( numero7 > 9 ){ var numero7 = (numero7 - 9); }
                        var numero9 = cedula.substring(8,9);
                        var numero9 = (numero9 * 2);
                        if( numero9 > 9 ){ var numero9 = (numero9 - 9); }
                        var impares = numero1 + numero3 + numero5 + numero7 + numero9;
                        //Suma total
                        var suma_total = (pares + impares);
                        //extraemos el primero digito
                        var primer_digito_suma = String(suma_total).substring(0,1);
                        //Obtenemos la decena inmediata
                        var decena = (parseInt(primer_digito_suma) + 1) * 10;
                        //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
                        var digito_validador = decena - suma_total;
                        //Si el digito validador es = a 10 toma el valor de 0
                        if(digito_validador == 10)
                            var digito_validador = 0;
                        //Validamos que el digito validador sea igual al de la cedula
                        if(digito_validador == ultimo_digito){
                            
                            
                            
                        }else{
                            var box = bootbox.alert("la cedula:" + cedula + " es incorrecta");
                            box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                        
                            bandera="N"
							return false;
                        }
                    }else{
                        // imprimimos en consola si la region no pertenece
                        var box = bootbox.alert("Esta cedula no pertenece a ninguna region");
                        box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                  
                        bandera="N"
						return false;
                    }
                }else{
                    //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
                    var box = bootbox.alert("Esta cedula tiene menos de 10 digitos");
                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                    
                    bandera="N"
					return false;
                }
				
				
	return true;

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
}//else if(accion=='E'){
// ajax.open("POST", "../php/actualizar_cliente.php", true);

// }

ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron guardados con exito!');
			window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("id="+id+"&nombre="+nombre+"&descripcion="+descripcion+"&direccion="+direccion+"&telefono="+telefono+"&horario="+horario+"&logo="+logo+"&banner="+banner+"&menu="+menu+"&video="+video+"&abre="+abre+"&cierra="+cierra+"&dias="+dias+"&latitud="+latitud+"&longitud="+longitud+"&categoria="+categoria);

}


