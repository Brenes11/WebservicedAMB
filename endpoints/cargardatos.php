<?php
 #Llamada al script controlador
 include_once("../controladores/controlador.php");
 
 $api = new ApiSitios();
 #Invocar el metodo que cargara los datos en pantalla
 $api->getAutos();
?>