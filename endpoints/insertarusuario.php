<?php
    include_once("../controladores/usercontroller.php");

    $apiUser = new apiUsers();

    $txtUsername = (isset($_REQUEST['txtUsername'])?$_REQUEST['txtUsername']:"");
    $txtPass = (isset($_REQUEST['txtPass'])?$_REQUEST['txtPass']:"");
    $txtRol = (isset($_REQUEST['txtRol'])?$_REQUEST['txtRol']:"");
    
    

    if($_REQUEST){
        $apiUser->addUser($txtUsername,$txtPass,$txtRol);
    }
?>