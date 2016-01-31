<?php include "php/cabecera.inc" ?>
<br>
<?php include "php/config.inc" ?>

<style type="text/css"> 
  *{ 
      font-size: 14px; 
  } 
  body{ 
  background:#aaa; 
  } 
  form.login { 
      background: none repeat scroll 0 0 #F1F1F1; 
      border: 1px solid #DDDDDD; 
      font-family: sans-serif; 
      margin: 0 auto; 
      padding: 20px; 
      width: 278px; 
      box-shadow:0px 0px 20px black; 
      border-radius:10px; 
  } 
  form.login div { 
      margin-bottom: 15px; 
      overflow: hidden; 
  } 
  form.login div label { 
      display: block; 
      float: left; 
      line-height: 25px; 
  } 
  form.login div input[type="text"], form.login div input[type="password"] { 
      border: 1px solid #DCDCDC; 
      float: right; 
      padding: 4px; 
  } 
  form.login div input[type="submit"] { 
      background: none repeat scroll 0 0 #DEDEDE; 
      border: 1px solid #C6C6C6; 
      float: right; 
      font-weight: bold; 
      padding: 4px 20px; 
  } 
  .error{ 
      color: red; 
      font-weight: bold; 
      margin: 10px; 
      text-align: center; 
  } 
</style> 

<?php
if(isset($_SESSION['carrito'])){

?>

<div class="text-center">
<h3>¿ya tienes Cuenta?</h3>
<form class="login" action="php/logcliente.php" method="POST">
    <div><label>Numero de Cédula</label><input type="text" class="input-append" name="usuario" placeholder="ejm: 0705295863"></div> 
    <div><label>Contraseña</label><input type="password" class="input-append" name="contrasena" placeholder="*********"></div> 
    <div><input name="login" class="password" type="submit" value="login"></div> 
</form> 
</div>

<?php

}else{

  ?>
<hr>
<div class="text-center">
<h3 class="text-center">debes agregar algo a tu pedido primero</h3>
</button>
</div>

  <?php
}
  

?>
<!-- registro modal -->




<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="modal-title" >NUEVO USUARIO</div>
            </div>
            <form role="form" method="POST" id="registro_nuevo" novalidate="novalidate" name="frmCliente">
              <div class="col-lg-12">
                
                <div class="form-group"  ><br>
                  <label>NOMBRES</label>
                  <input name="nombre" class="form-control" required>
                </div>

                <div class="form-group"><br>
                  <label>APELLIDOS</label>
                  <input name="apellido" class="form-control" required>
                </div>
                <div class="row">
                <div class="form-group col-xs-6">
                  <label>NUMERO DE CEDULA </label>
                  <input name="cedula" class="form-control" required>
                </div>
                <div class="form-group col-xs-6">
                  <label>TELEFONO</label>
                  <input name="telefono" class="form-control" required>
                </div>

                </div>
                <div class="form-group">
                  <label>DIRECCIÓN</label>
                  <input name="direccion" class="form-control" required>
                </div>

                
                <div class="form-group">
                  <label>CORREO ELECTRONICO</label>
                  <input name="correo" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>CONTRASEÑA</label>
                  <input name="contra" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>CONFIRME SU CONTRASEÑA</label>
                  <input name="c_contra" class="form-control" required>
                </div>
                

              </div>
              
            
            <div class="modal-footer">
              <input name="new_user" class="btn" onclick="Registrar_Cliente()" value="REGISTRAR">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancel</button>
            
            </div>
            </form>
          </div>
        </div>
      </div>



<!-- registro modal -->



<hr>
<div class="text-center">
<h3 class="text-center">¿Eres nuevo usuario?</h3>
<button class="btn btn-inverse" onclick="Nuevo();">
<a>REGISTRATE</a>
</button>
</div>


<script>

 window.fbAsyncInit = function() {

 FB.init({

   appId      : '1712952485585043',

   status     : true, // check login status

   cookie     : true, // enable cookies to allow the server to access the session

   version    : 'v2.5',


   xfbml      : true  // parse XFBML

 });

 // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired

 // for any authentication related change, such as login, logout or session refresh. This means that

 // whenever someone who was previously logged out tries to log in again, the correct case below

 // will be handled.

 FB.Event.subscribe('auth.authResponseChange', function(response) {

   // Here we specify what we do with the response anytime this event occurs.

   if (response.status === 'connected') {

     	 testAPI();

         document.getElementById("logout").style.display="inherit";

     testAPI();

   } else if (response.status === 'not_authorized') {

     // In this case, the person is logged into Facebook, but not into the app, so we call

     // FB.login() to prompt them to do so.

     // In real-life usage, you wouldn't want to immediately prompt someone to login

     // like this, for two reasons:

     // (1) JavaScript created popup windows are blocked by most browsers unless they

     // result from direct interaction from people using the app (such as a mouse click)

     // (2) it is a bad experience to be continually prompted to login upon page load.

     FB.login();

   } else {

     // In this case, the person is not logged into Facebook, so we call the login()

     // function to prompt them to do so. Note that at this stage there is no indication

     // of whether they are logged into the app. If they aren't then they'll see the Login

     // dialog right after they log in to Facebook.

     // The same caveats as above apply to the FB.login() call here.

     FB.login();

   }

 });

 };


 (function(d){

  var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];

  if (d.getElementById(id)) {return;}

  js = d.createElement('script'); js.id = id; js.async = true;

  js.src = "//connect.facebook.net/en_US/all.js";

  ref.parentNode.insertBefore(js, ref);

 }(document));

 // Here we run a very simple test of the Graph API after login is successful.

 // This testAPI() function is only called in those cases.

 function testAPI() {

   console.log('Welcome!  Fetching your information…. ');

   FB.api('/me', function(response) {

     console.log('Good to see you, ' + response.name + '.');

   });

 }

 function logOut()

{

  FB.logout(function(response) {

alert("Usted ha cerrado sesion satisfactoriamente");

location = "index.php";

});

}

</script>

<!-- validando campos vacios -->



<script type="text/javascript">
    function Nuevo(){
      document.frmCliente.nombre.value="";
      document.frmCliente.apellido.value ="";
      document.frmCliente.cedula.value = "";
      document.frmCliente.correo.value = "";
      document.frmCliente.direccion.value = "";
      document.frmCliente.telefono.value = ""; 
      document.frmCliente.contra.value = ""; 
      document.frmCliente.c_contra.value = ""; 
      $('#modal').modal('show');
    }

</script>








<!--Below we include the Login Button social plugin. This button uses the JavaScript SDK to

	present a graphical Login button that triggers the FB.login() function when clicked
 -->
 <hr>
<fb:login-button show-faces="true" width="200" max-rows="2"></fb:login-button>
<div id="logout" style="display:none;" onclick="logOut();"><a href="#">Salir</a></div>





























<?php include "php/piedepagina.inc" ?>






  

