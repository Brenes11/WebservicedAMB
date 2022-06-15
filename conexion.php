<?php
class Conexion
{
    //Atributos de la clase
    protected $servidor;
    protected $baseEsquema;
    protected $usuario;
    protected $password;
    protected $error;
    protected $link;
    protected $charset;


    //Constructor
    function __construct()
    {
        #Se utiliza para especificar la codificación de caracteres
        $this->charset = "utf8mb4";
        #Nombre del servidor o direccion IP de donde está la base de datos
        $this->servidor = "localhost";
        #Nombre de la base de datos a conectar
        $this->baseEsquema = "turismo";
        #Nombre del usuario con privilegios en la base
        $this->usuario = "root";
        #Clave del usuario en la base de datos
        $this->password = "";

        #Estableciendo la conexión a la base de datos
        #Esta conexion es almacenada en el atributo link
        $this->link = mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->password,
            $this->baseEsquema
        );
        #Estableciendo el esquema de caracteres de la base de datos
        mysqli_set_charset($this->link, $this->charset);
        #Verificar si hay una conexión correcta con el servidor
        if (!$this->link) {
            #Mostrar mensaje al usuario de error.
            #En esta parte se puede redireccionar a una página personalizada
            #que indique la falla
            echo "<h2>Error en la conexion</h2>";
            #Mostrar error con el método mostrarError
            $this->mostrarError();
        }
    } //Fin de construct
    //Función para desconectar
    public function cerrarConexion()
    {
        return (mysqli_close($this->link));
    } //Fin de cerrarConexion
    #Función para mostrar el tipo de error en una consulta SQL
    public function mostrarError()
    {
        echo ($this->error);
        exit();
    }

    #Función para ejecutar una consulta SQL
    public function consultaSQL($sql)
    {
        if (!($resultado = mysqli_query($this->link, $sql))) {
            $this->error = "Error" . $this->link->error;
            $this->mostrarError();
        } else {
            return ($resultado);
        }
    } //Fin de consultaSQL
}//Fin de clase
?>