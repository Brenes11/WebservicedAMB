<?php
include("../conexion.php");
#Incluyendo rutas de donde están alojadas las imágenes de:
$rutaicono = "../imagenes/iconos/"; //ICONOS
$rutaportada = "../imagenes/sitios/"; //PORTADAS
#Instanciando la clase de Conexión para poder usar sus métodos
$base = new Conexion();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="../jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../jquery/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="../jquery/jQuery.mobile.theme-1.4.5.min.css" />
    <script src="../jquery/jQuery.mobile-1.4.5.min.js"></script>
    <title>Registro de Sitios</title>

</head>

<body>
    <div data-role="page" id="page">
        <div data-role="header" data-theme="b">
            <a href="" data-icon="home" data-role="button" title="Inicio" data-iconpos="notext" class="ui-btn-active ui-shadow-icon">Inicio</a>
            <h1>eTurismo Cultural</h1>
        </div>
        <div data-role="content">
            <form id="frmRegistro" name="frmRegistro" method="post" enctype="multipart/form-data" data-ajax="false">
                <table width="100%" border="0">
                    <tr>
                        <th colspan="2" align="center">REGISTRO DE SITIOS TURÍSTICOS</th>
                    </tr>
                    <tr>
                        <td width="11%">Titulo:</td>
                        <td width="89%"><label for="txtTitulo"></label>
                            <input name="txtTitulo" type="text" id="txtTitulo" size="100" maxlength="100" />
                        </td>
                    </tr>
                    <tr>
                        <td>Introducción:</td>
                        <td><label for="txtIntroduccion"></label>
                            <label for="txtIntroduccion"></label>
                            <textarea name="txtIntroduccion" id="txtIntroduccion" cols="80" rows="3"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Imagen ICONO:</td>
                        <td><input type="file" name="btnIcono" size="50" /></td>
                    </tr>
                    <tr>
                        <td>Imagen Portada:</td>
                        <td><input type="file" name="btnPortada" size="50" /></td>
                    </tr>
                    <tr>
                        <td>Descripcion:</td>
                        <td><label for="txtDescripcion"></label>
                            <label for="txtDescripcion"></label>
                            <textarea name="txtDescripcion" id="txtDescripcion" cols="100" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btnGuardar" id="btnGuardar" value="CREAR NUEVO SITIO">
                        </td>
                    </tr>
                </table>
                <?php

                /******************************************************* */
                /* Procediendo con el guardado del registro en la tabla */
                /****************************************************** */
                if (isset($_REQUEST['btnGuardar'])) {
                    //RECOLECTANDO LOS VALORES ENVIADOS POR EL FORMULARIO
                    $txtTitulo = $_REQUEST['txtTitulo'];
                    $txtIntroduccion = $_REQUEST['txtIntroduccion'];
                    $txtDescripcion = $_REQUEST['txtDescripcion'];
                    //Establecemos una cifra aleatoria para el archivo a subir y evitar duplicidad
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);

                    $icono = $_FILES["btnIcono"]["name"];
                    $icono = $prefijo . "_" . $icono;

                    // Carpeta donde se guardaran las imagenes
                    $destinoIcono = $rutaicono . $icono;

                    //Procediendo con la copia del archivo a la carpeta del servidor
                    copy($_FILES["btnIcono"]["tmp_name"], $destinoIcono);

                    //Copiando archivo de imagen a la carpeta del servidor
                    $portada = $_FILES["btnPortada"]["name"];
                    $portada = $prefijo . "_" . $portada;

                    //Carpeta donde se guardaran las imagenes
                    $destinoPortada = $rutaportada . $portada;
                    //Procediendo con la copia del archivo a la carpeta del servidor
                    copy($_FILES["btnPortada"]["tmp_name"], $destinoPortada);

                    //Preparando la variable sql para insertar los datos a la tabla
                    $sqlInsercion = "INSERT INTO sitio (imagenIcono,titulo,introduccion,imagenPortada,descripcion)
values('" . $icono . "', '" . $txtTitulo . "', '" . $txtIntroduccion . "','" . $portada . "',
'" . $txtDescripcion . "')";
                    $rsInsercion = $base->consultaSQL($sqlInsercion);
                    print "<script>alert('Registro almacenado correctamente');</script>";
                } //Fin de GUARDAR
                ?>
            </form>
        </div>
        <div data-role="footer" data-theme="b">
            <h4>Derechos reservados &copy;</h4>
        </div>

    </div>
</body>

</html>