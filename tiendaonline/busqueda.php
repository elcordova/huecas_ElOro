<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>


<div class="container-fluid">
<div class="page-header text-center"><h4>BUSCAR HUECAS</h4></div>
<p> Elige donde hacer tus pedidos segun tu gusto</p>
<div class="navbar-collapse">

      <form class="navbar-form form-search" role="search">
      <div class="form-group text center">
      	<label >¿que es lo que buscas?: </label>
        <input type="text" class="input-medium search-query form-control" name="busqueda" placeholder="busqueda por hueca" id="busqueda" autocomplete="off" onKeyUp="buscar();" />
      </div>
      <ul id="resultadoBusqueda" class="list-unstyled press"></ul>
      </form>
      </div>



<script type="text/javascript">
  function buscar() 
  {
      var textoBusqueda = $("input#busqueda").val();

      if (textoBusqueda != "") {
          $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
          }); 
      } else { 
          ("#resultadoBusqueda").html('');
    };
  };

</script>



</div>






<?php include "php/piedepagina.inc" ?>