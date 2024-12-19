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
        $consultar = "SELECT * FROM usuario";
        $ejecutarConsulta = $conn->query($consultar);

        if ($ejecutarConsulta->num_rows > 0) {
            echo json_encode(["status" => "99", "message" => "Ya existe un usuario con el correo indicado"]);
        } else {
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
            case 'updateAdmin':
                $idUser = $_SESSION['usuario_id'];
                $correoActual = $_SESSION['usuario_correo'];
                $nombre = $data['nombre'];
                $apellido1 = $data['apellido1'];
                $apellido2 = $data['apellido2'];
                $telefono = $data['telefono'];
                $correo = $data['correo'];
                $direccion = $data['direccion'];
                $provincia = $data['provincia'];
                $canton = $data['canton'];
                $distrito = $data['distrito'];
            
                // Validar si el correo ya existe
                $buscarCorreo = "SELECT * FROM usuario WHERE Correo = ? AND ID_Usuario != ?";
                $stmtCorreo = $conn->prepare($buscarCorreo);
                $stmtCorreo->bind_param("si", $correo, $idUser);
                $stmtCorreo->execute();
                $resultado = $stmtCorreo->get_result();
            
                if ($resultado->num_rows > 0) {
                    echo json_encode(["status" => "99", "message" => "El correo ingresado ya existe en la base de datos."]);
                    break;
                }
            
                // Actualizar usuario
                $sql = "UPDATE usuario 
                        SET Nombre = ?, Apellido1 = ?, Apellido2 = ?, Telefono = ?, Correo = ? 
                        WHERE ID_Usuario = ?";
                $stmtUsuario = $conn->prepare($sql);
                $stmtUsuario->bind_param("sssssi", $nombre, $apellido1, $apellido2, $telefono, $correo, $idUser);
            
                case 'updateAdmin':
                    $idUser = $_SESSION['usuario_id'];
                    $correoActual = $_SESSION['usuario_correo'];
                    $nombre = $data['nombre'];
                    $apellido1 = $data['apellido1'];
                    $apellido2 = $data['apellido2'];
                    $telefono = $data['telefono'];
                    $correo = $data['correo'];
                    $direccion = $data['direccion'];
                    $provincia = $data['provincia'];
                    $canton = $data['canton'];
                    $distrito = $data['distrito'];
                
                    // Validar si el correo ya existe
                    $buscarCorreo = "SELECT * FROM usuario WHERE Correo = ? AND ID_Usuario != ?";
                    $stmtCorreo = $conn->prepare($buscarCorreo);
                    $stmtCorreo->bind_param("si", $correo, $idUser);
                    $stmtCorreo->execute();
                    $resultado = $stmtCorreo->get_result();
                
                    if ($resultado->num_rows > 0) {
                        echo json_encode(["status" => "99", "message" => "El correo ingresado ya existe en la base de datos."]);
                        break;
                    }
                
                    // Actualizar usuario
                    $sql = "UPDATE usuario 
                            SET Nombre = ?, Apellido1 = ?, Apellido2 = ?, Telefono = ?, Correo = ? 
                            WHERE ID_Usuario = ?";
                    $stmtUsuario = $conn->prepare($sql);
                    $stmtUsuario->bind_param("sssssi", $nombre, $apellido1, $apellido2, $telefono, $correo, $idUser);
                
                    if ($stmtUsuario->execute()) {
                        // Verificar si el correo cambió
                        if ($correo !== $correoActual) {
                            session_unset();
                            session_destroy();
                            echo json_encode([
                                "status" => "01",
                                "message" => "El correo ha sido cambiado. Por favor, inicia sesión de nuevo.",
                            ]);
                            break;
                        }
                
                        // Actualizar dirección
                        $direccionUpdate = "UPDATE direccion 
                                            SET Direccion_Exacta = ?, Provincia = ?, Canton = ?, Distrito = ? 
                                            WHERE ID_Usuario = ?";
                        $stmtDireccion = $conn->prepare($direccionUpdate);
                        $stmtDireccion->bind_param("ssssi", $direccion, $provincia, $canton, $distrito, $idUser);
                
                        if ($stmtDireccion->execute()) {
                            echo json_encode(["status" => "00", "message" => "Usuario actualizado exitosamente."]);
                        } else {
                            echo json_encode(["status" => "99", "message" => "Error al actualizar la dirección: " . $stmtDireccion->error]);
                        }
                
                        $stmtDireccion->close();
                    } else {
                        echo json_encode(["status" => "99", "message" => "Error al actualizar el usuario: " . $stmtUsuario->error]);
                    }
                
                    $stmtUsuario->close();
                    break;
                
                $stmtUsuario->close();
                break;
            
            case 'getUsuario':
                if(isset($_SESSION['usuario_id'])){
                $id = $_SESSION['usuario_id'];
                $sql = "SELECT a.Apellido1, a.Nombre, a.Apellido2, a.Correo, a.Telefono, b.Direccion_Exacta, b.Provincia, b.Canton, b.Distrito, a.Password
                        FROM usuario a
                        INNER JOIN direccion b
                        ON a.ID_Usuario = b.ID_Usuario
                        WHERE a.ID_Usuario = '$id'";
                $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                            $users = [];
                            $user = $result->fetch_assoc();
                            $users[] = [
            "Nombre" => $user['Nombre'],
            "Apellido1" => $user['Apellido1'],
            "Apellido2" => $user['Apellido2'],
            "Correo" => $user['Correo'],
            "Telefono" => $user['Telefono'],
            "Direccion" => $user['Direccion_Exacta'],
            "Provincia" => $user['Provincia'],
            "Canton" => $user['Canton'],
            "Distrito" => $user['Distrito'],
            "Password" => $user['Password']
        ];

        echo json_encode([
            "status" => "00",
            "users" => $users
        ]);
    } else {
        echo json_encode([
            "status" => "99",
            "users" => "No se encontró información para el usuario especificado."
        ]);
    }
}
    break;
    case 'actualizarPassword':
        $contraActual = $data['contraActual'];
        $password = $data['passwordHash'];
        $nuevoPassword = $data['newPassword'];
        $hash_password = password_hash($nuevoPassword, PASSWORD_BCRYPT);
    
        // Verificar si la contraseña actual coincide
        if (password_verify($contraActual, $password)) {
            $sql = "UPDATE usuario SET Password = ? WHERE ID_Usuario = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("si", $hash_password, $idUsuarioSesion);
    
                if ($stmt->execute()) {
                    // Cerrar la sesión y redirigir al login
                    session_unset();
                    session_destroy();
    
                    // Redirección al login
                    echo json_encode([
                        "status" => "00",
                        "message" => "Contraseña actualizada correctamente. Redirigiendo al inicio de sesión..."
                    ]);
    
                    exit; // Detener ejecución después de la redirección
                } else {
                    echo json_encode([
                        "status" => "99",
                        "message" => "No se pudo actualizar la contraseña. Error en la base de datos."
                    ]);
                }
                $stmt->close();
            } else {
                echo json_encode([
                    "status" => "99",
                    "message" => "Error al preparar la consulta: " . $conn->error
                ]);
            }
        } else {
            echo json_encode([
                "status" => "01",
                "message" => "La contraseña actual no es correcta."
            ]);
        }
        break;
    
    

        default:
        break;
}






?>