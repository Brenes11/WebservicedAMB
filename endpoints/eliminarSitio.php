<?php
    include_once("../controladores/controlador.php");

    $apiSitio = new ApiSitios();

    $txtSitioId = (isset($_REQUEST['txtSitioId'])?$_REQUEST['txtSitioId']:"");

    if($_REQUEST){
        $apiSitio->deleteSitio($txtSitioId);
    }
?>