<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

	echo "
		<ul class='nav nav-tabs'>
  <li><a href='hueca.php?id=".$_GET['id']."'>PLATOS</a></li>
  <li><a href='videos.php?id=".$_GET['id']."'>VIDEOS</a></li>
  <li><a href='galeria.php?id=".$_GET['id']."'>GALERIA</a></li>
<li class='active'><a href='#''>COMO LLEGAR</a></li>

		</ul>







	";


?>
<?php include "php/piedepagina.inc" ?>