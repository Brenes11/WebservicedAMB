<?php
#Llamada a la clase de conexion
include_once("../conexion.php");
#Crear una nueva clase que HEREDE atributos y métodos de "Conexión"
class Sitios extends Conexion
{

    #Método público para ser utilizado en cualquier otra clase o método
    public function listarSitios()
    {
        #Preparar la consulta SQL que retornara los datos de la tabla
        $sql = "SELECT
 sitioid,
 imagenIcono,
 titulo,
 introduccion,
 imagenPortada,
 descripcion
 from sitio";
        #Invocar el método que ejecutara la consulta SQL
        $rs = $this->consultaSQL($sql);
        #retornar la variable con el resultado de la consulta SQL
        return $rs;
    }
    public function ilstarSitiosById($sitioId){
        $sql = "SELECT
        sitioid,
        imagenIcono,
        titulo,
        introduccion,
        imagenPortada,
        descripcion
        from sitio where sitioid = $sitioId";
               #Invocar el método que ejecutara la consulta SQL
               $rs = $this->consultaSQL($sql);
               #retornar la variable con el resultado de la consulta SQL
               return $rs;
    }

    public function insertarSitio($titulo, $introduccion, $descripcion, $imagenIcono, $imagenPortada){
        $sql = "INSERT INTO sitio (titulo, introduccion, descripcion, imagenIcono, imagenPortada) 
        VALUES('$titulo', '$introduccion', '$descripcion','$imagenIcono', '$imagenPortada');";
        $rs = $this->consultaSQL($sql);

        return $rs;
    }//Fin insertar usuarios

    public function eliminarsitio($sitioId){
        $sql = "DELETE FROM sitio where sitioId = '$sitioId'";
        $rs = $this->consultaSQL($sql);

        return $rs;
    }

    public function editarSitio($sitioId,$titulo, $introduccion, $descripcion, $imagenIcono, $imagenPortada){
        $sql = "UPDATE sitio set titulo = '$titulo', introduccion = '$introduccion', descripcion = '$descripcion',
        imagenPortada = '$imagenPortada', imagenIcono = '$imagenIcono' where sitioid = $sitioId";

        $rs = $this->consultaSQL($sql);

        return $rs;
    }
}//Fin de Sitios
?>
