<?php include "php/cabecera.inc" ?>
<?php include "php/config.inc" ?>
<?php

	echo "
		<ul class='nav nav-tabs'>
  <li><a href='hueca.php?id=".$_GET['id']."'>PLATOS</a></li>
  <li class='active'><a href='#'>VIDEOS</a></li>
  <li><a href='galeria.php?id=".$_GET['id']."'>GALERIA</a></li>
<li><a href='comollegar.php?id=".$_GET['id']."'>COMO LLEGAR</a></li>

		</ul>







	";


?>
<?php include "php/piedepagina.inc" ?>