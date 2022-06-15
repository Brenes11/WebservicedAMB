<?php
#Llamada a la clase de Sitios
include_once("../modelos/modelo.php");
class ApiSitios
{
    #Método para preparar arreglo con el resultado de la consulta del método listarSitios()
    function getAutos()
    {
        #Instanciando a la clase Sitios
        $sitio = new Sitios();

        #Creando arreglo asociativo
        $sitios['items'] = array();
        #Invocando el método listarSitios y asignar el resultado a la variable temporal
        $res = $sitio->listarSitios();
        #Validar si hay un numero de filas obtenidas
        if (mysqli_num_rows($res) > 0) {
            #Recorrer resultado por medio de arreglo asociativo
            while ($fila = mysqli_fetch_assoc($res)) {
                #Creando arreglo asociativo auxiliar con los nombres
                #de los campos de la consulta sql usada en modelo.php
                $item = array(
                    "id" => $fila["sitioid"],
                    "icono" => $fila["imagenIcono"],
                    "titulo" => $fila["titulo"],
                    "introduccion" => $fila["introduccion"],
                    "imagenportada" => $fila["imagenPortada"],
                    "descripcion" => $fila["descripcion"]
                );

                #Añadir array auxiliar al array principal

                array_push($sitios["items"], $item);
            } //fin de while

            #Mostrar el arreglo con formato json
            header('Content-Type: application/json');
            echo json_encode($sitios,JSON_PRETTY_PRINT);
            
        } else echo json_encode(array("mensaje" => "No hay nada"));
    } //Fin de getSitios

    function getSitioById($SitioId){
        $sitio = new Sitios();
        $sitios['items'] = array();
        $res = $sitio->ilstarSitiosById($SitioId);

        if (mysqli_num_rows($res) > 0) {
            #Recorrer resultado por medio de arreglo asociativo
            while ($fila = mysqli_fetch_assoc($res)) {
                #Creando arreglo asociativo auxiliar con los nombres
                #de los campos de la consulta sql usada en modelo.php
                $item = array(
                    "id" => $fila["sitioid"],
                    "icono" => $fila["imagenIcono"],
                    "titulo" => $fila["titulo"],
                    "introduccion" => $fila["introduccion"],
                    "imagenportada" => $fila["imagenPortada"],
                    "descripcion" => $fila["descripcion"]
                );

                #Añadir array auxiliar al array principal

                array_push($sitios["items"], $item);
            } //fin de while

            #Mostrar el arreglo con formato json
            header('Content-Type: application/json');
            echo json_encode($sitios,JSON_PRETTY_PRINT);
            
        }

    }

    function addSitios($titulo, $introduccion, $descripcion,$imagenIcono, $imagenPortada){
        $sitio = new Sitios();

        if($sitio->insertarSitio($titulo,$introduccion,$descripcion,$imagenIcono,$imagenPortada)){
            echo "Sitio agregado con éxito";
        }else{
            echo "Error al insertar sitio";
        }
    }

    function deleteSitio($sitioId){
        $sitio = new Sitios();
        if($sitio->eliminarsitio($sitioId)){
            echo "Sitio elimiado con éxito";
        }else{
            echo "Error al eliminar sitio";
        }
    }

    function updateSitio($sitioId,$titulo, $introduccion, $descripcion, $imagenIcono, $imagenPortada){
        $sitio = new Sitios();
        if($sitio->editarSitio($sitioId,$titulo, $introduccion, $descripcion, $imagenIcono, $imagenPortada)){
            echo "Sitio editado con éxito";
        }else{
            echo "Error al editar sitio";
        }
    }

}//Fin de ApiSitios
?>

