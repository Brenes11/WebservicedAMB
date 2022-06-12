<?php
 #Llamada al script controlador
 include_once("../controladores/usercontroller.php");
 
 $api = new apiUsers();
 #Invocar el metodo que cargara los datos en pantalla
 $api->getAllUsers();
?>