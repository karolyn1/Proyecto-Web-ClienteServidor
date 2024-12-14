<?php
include("conexion.php");
session_start();

$idUsuarioSesion = $_SESSION['usuario_id'];
$data = $_POST;


switch ($data['action']) {
    case 'add':
        // Obtén los datos del formulario
        $Telefono = mysqli_real_escape_string($conn, $data['telefono']);
        $Apellido1 = mysqli_real_escape_string($conn, $data['apellido1']);
        $Apellido2 = mysqli_real_escape_string($conn, $data['apellido2']);
        $Correo = mysqli_real_escape_string($conn, $data['correo']);
        $Nombre = mysqli_real_escape_string($conn, $data['nombre']);
        $Rol = mysqli_real_escape_string($conn, $data['rol']);
        $Estado = 'Activo'; // El estado lo puedes establecer directamente
        $Password = mysqli_real_escape_string($conn, $data['password']);
        $Password = password_hash($Password, PASSWORD_DEFAULT); // Hashea la contraseña para mayor seguridad
    
        try {
            // Inserción de usuario
            $sql = "INSERT INTO usuario (Nombre, Apellido1, Apellido2, Estado, Correo, Telefono, Password) 
                    VALUES ('$Nombre', '$Apellido1', '$Apellido2', '$Estado', '$Correo', '$Telefono', '$Password')";
    
            $ejecutarUsuario = $conn->query($sql);
    
            if ($ejecutarUsuario) {
                $idUsuario = $conn->insert_id; // Obtén el ID del usuario recién insertado
    
                // Insertar el rol en la tabla roles
                $sqlRol = "INSERT INTO roles (ID_Usuario, Rol) VALUES ('$idUsuario', '$Rol')";
                $ejecutarRol = $conn->query($sqlRol);
    
                if ($ejecutarRol) {
                    echo json_encode(["status" => "00", "message" => "Usuario y rol insertados correctamente"]);
                } else {
                    // Si falla la inserción del rol, elimina el usuario insertado
                    $deleteUsuario = "DELETE FROM usuario WHERE ID_Usuario = '$idUsuario'";
                    $conn->query($deleteUsuario);
    
                    echo json_encode(["status" => "99", "message" => "Hubo un error al insertar el rol"]);
                }
            } else {
                echo json_encode(["status" => "99", "message" => "Hubo un error al insertar el usuario"]);
            }
    
        } catch (Exception $e) {
            echo json_encode(["status" => "99", "message" => "Error en la operación: " . $e->getMessage()]);
        }
        break;
    
    case 'actualizar':
        $id = $data["id"];
        if (isset($data['id'])) {
            $id = $data['id'];
            $Telefono = $data['telefono'];
            $Apellido1 = $data['apellido1'];
            $Apellido2 = $data['apellido2'];
            $Correo = $data['correo'];
            $Nombre = $data['nombre'];
            $Rol = $data['rol'];
            $Estado = $data['estado'];
            $sql = "UPDATE usuario a INNER JOIN roles b ON a.ID_Usuario = b.ID_Usuario SET  a.Nombre = '$Nombre', a.Apellido1 = '$Apellido1', a.Apellido2 = '$Apellido2', a.Estado = '$Estado',
                a.Correo = '$Correo', a.Telefono = '$Telefono', b.Rol = '$Rol'
                 WHERE a.ID_Usuario = '$id'; ";
            $result = $conn->query($sql);
            if ($result) {
                echo json_encode(["status" => "00", "message" => "Usuario actualizado correctamente"]);
            } else {
                echo json_encode(["status" => "99", "message" => "No se pudo actualizar el usuario"]);
            }
        } else {
            echo json_encode(["status" => "99", "message" => "Error al ejecutar la acción"]);
        }

        break;
        case 'eliminar': 
            $id = $data['id'];
            if (isset($data['id'])) {
                $id = $data['id'];
                $sql = "SELECT a.ID_Usuario, b.Rol, b.ID_Rol
                        FROM usuario a
                        INNER JOIN roles b
                        ON a.ID_Usuario = b.ID_Usuario
                        WHERE a.ID_Usuario = '$id'";
                
                $result = $conn->query($sql);
                
                if ($result) { 
                    $usuario = $result->fetch_assoc();
                    //valido si el usuario que voy a eliminar es el mismo de mi sesion
                    if($usuario['ID_Usuario'] == $idUsuarioSesion){
                        echo json_encode(["status" => "99", "message" => "No es posible eliminar tu propio usuario administrador"]);
                    } else {
                    // Si el rol es 'admin', se elimina el usuario y su rol
                    if ($usuario['Rol'] == 'admin') {
                        $eliminarUsuario = "DELETE FROM usuario WHERE ID_Usuario = '$usuario[ID_Usuario]';";
                        $ejecutar = $conn->query($eliminarUsuario);
                        
                        $eliminarRol = "DELETE FROM roles WHERE ID_Rol = '$usuario[ID_Rol]';";
                        $ejecutar = $conn->query($eliminarRol);
                        
                        echo json_encode(["status" => "00", "message" => "El usuario administrador ha sido eliminado"]);
                    } else {
                        // Si el rol es 'cliente', solo se desactiva
                        $actualizarEstado = "UPDATE usuario SET Estado = 'inactivo' WHERE ID_Usuario = '$usuario[ID_Usuario]';";
                        $ejecutar = $conn->query($actualizarEstado);
                        
                        echo json_encode(["status" => "00", "message" => "El usuario cliente ha sido desactivado"]);
                    }
                    }
             } else {
                    echo json_encode(["status" => "99", "message" => "Lo sentimos. Hubo un error al procesar la solicitud"]);
                }
            }
            break;
    
    default:
        break;
}






?>