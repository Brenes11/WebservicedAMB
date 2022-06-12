<?php
    include_once("../modelos/ModeloUsuario");
    Class apiUsers{
        function getAllUsers(){
            $usuario = new usuarios();

        #Creando arreglo asociativo
        $users['items'] = array();

        $res = $usuario->getUsers();

        if (mysqli_num_rows($res) > 0) {
            #Recorrer resultado por medio de arreglo asociativo
            while ($fila = mysqli_fetch_assoc($res)) {
                #Creando arreglo asociativo auxiliar con los nombres
                #de los campos de la consulta sql usada en modelo.php
                $item = array(
                    "idUsuario" => $fila["id_usuario"],
                    "username" => $fila["username"],
                    "password" => $fila["pass"],
                    "rol" => $fila["rol"]
                    
                );

                #Añadir array auxiliar al array principal

                array_push($users["items"], $item);
            } //fin de while

            #Mostrar el arreglo con formato json
            header('Content-Type: application/json');
            echo json_encode($users,JSON_PRETTY_PRINT);
            
        } else echo json_encode(array("mensaje" => "No hay nada"));

        }

        function addUser($username, $pass, $rol){

            $user = new usuarios();

            if($user->insertarUsuario($username, $pass, $rol)){
                echo "usuario agregado con éxito";
            }else{
                echo "Error al insertar usuario";
            }

        }

        function login($username, $pass){
            $user = new usuarios();

            
            if($user->loguearse($username, $pass)){

                echo "Bienvenido usuario";
            }else{
                echo "Usuario o contraseña incorrecta";
            }
        }
    }
?>