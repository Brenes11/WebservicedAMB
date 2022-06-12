<?php
    include_once("../controladores/controlador.php");

    $apiSitio = new ApiSitios();

    $txtTitulo = (isset($_REQUEST['txtTitulo'])?$_REQUEST['txtTitulo']:"");
    $txtIntroduccion = (isset($_REQUEST['txtIntroduccion'])?$_REQUEST['txtIntroduccion']:"");
    $txtDescripcion = (isset($_REQUEST['txtDescripcion'])?$_REQUEST['txtDescripcion']:"");
    $txtImagenIcono = (isset($_REQUEST['txtImagenIcono'])?$_REQUEST['txtImagenIcono']:"");
    $txtImagenPortada = (isset($_REQUEST['txtImagenPortada'])?$_REQUEST['txtImagenPortada']:"");

    if($_REQUEST){
        $apiSitio->addSitios($txtTitulo,$txtIntroduccion,$txtDescripcion,$txtImagenIcono,$txtImagenPortada);
    }
?>