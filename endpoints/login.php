<?php
 #Llamada al script controlador
 include_once("../controladores/usercontroller.php");
 
 $api = new apiUsers();
 $txtUser = (isset($_REQUEST['txtUser'])?$_REQUEST['txtUser']:"");
 $txtPassword = (isset($_REQUEST['txtPassword'])?$_REQUEST['txtPassword']:"");
 #Invocar el metodo que cargara los datos en pantalla
 $api->login($txtUser, $txtPassword);
?>