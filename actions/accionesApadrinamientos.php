<?php
include("conexion.php");

$data = $_POST;

switch($data['action']){
    case 'mostrar':
        $sql = "SELECT a.ID, c.ID_Animal, b.ID_Usuario, a.FechaApadrinamiento, a.FechaFin, a.Monto, a.Frecuencia, CONCAT(b.Nombre, ' ', b.Apellido1, ' ', b.Apellido2) as NombreCompleto, c.Nombre, c.Raza, c.Fecha_Nacimiento
        FROM animal_usuario a
        INNER JOIN usuario b 
        ON a.ID_Usuario = b.ID_Usuario
        INNER JOIN animal c
        ON a.ID_Animal = c.ID_Animal
        WHERE a.Estado = 1";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $apadrinamientos = [];
            while ($padrino = $result->fetch_assoc()) {
                $apadrinamientos[] = [
                    "ID" => $padrino["ID"],
                    "NombreAnimal" => $padrino["Nombre"],
                    "Raza" => $padrino["Raza"],
                    "NombrePadrino" => $padrino["NombreCompleto"],
                    "ID_Animal" => $padrino["ID_Animal"],
                    "ID_Usuario" => $padrino["ID_Usuario"],
                    "FechaApadrinamiento" => $padrino["FechaApadrinamiento"],
                    "FechaFin" => $padrino["FechaFin"],
                    "FechaNacimiento" => $padrino["Fecha_Nacimiento"],
                    "Frecuencia" => $padrino["Frecuencia"],
                     "Monto" => $padrino["Monto"]
                ];
            }
            echo json_encode(["status" => "00", "padrinos" => $apadrinamientos]);
        } else {
            echo json_encode(["status" => "99", "padrinos" => []]);
        }
        break;
        case 'mostrarTodos':
            $sql = "SELECT a.ID, c.ID_Animal, a.Estado, b.ID_Usuario, a.FechaApadrinamiento, a.FechaFin, a.Monto, a.Frecuencia, CONCAT(b.Nombre, ' ', b.Apellido1, ' ', b.Apellido2) as NombreCompleto, c.Nombre, c.Raza, c.Fecha_Nacimiento
            FROM animal_usuario a
            INNER JOIN usuario b 
            ON a.ID_Usuario = b.ID_Usuario
            INNER JOIN animal c
            ON a.ID_Animal = c.ID_Animal";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                $apadrinamientos = [];
                while ($padrino = $result->fetch_assoc()) {
                    $apadrinamientos[] = [
                        "ID" => $padrino["ID"],
                        "NombreAnimal" => $padrino["Nombre"],
                        "Raza" => $padrino["Raza"],
                        "NombrePadrino" => $padrino["NombreCompleto"],
                        "ID_Animal" => $padrino["ID_Animal"],
                        "ID_Usuario" => $padrino["ID_Usuario"],
                        "FechaApadrinamiento" => $padrino["FechaApadrinamiento"],
                        "FechaFin" => $padrino["FechaFin"],
                        "FechaNacimiento" => $padrino["Fecha_Nacimiento"],
                        "Frecuencia" => $padrino["Frecuencia"],
                         "Monto" => $padrino["Monto"],
                         "Estado" => $padrino["Estado"]
                    ];
                }
                echo json_encode(["status" => "00", "padrinos" => $apadrinamientos]);
            } else {
                echo json_encode(["status" => "99", "padrinos" => []]);
            }

            break;
        case 'editar':
            $id = $data['id'];
            $monto = $data['monto'];
            $frecuencia = $data['frecuencia'];
            $sql = "UPDATE animal_usuario SET Monto = '$monto', Frecuencia = '$frecuencia' WHERE ID = '$id'";
            $result = $conn->query($sql);
            if($result){
                echo json_encode(["status" => "00", "message" => "Apadrinamiento actualizado"]);
            } else {
                echo json_encode(["status" => "99", "message" => "Error al actualizar apadrinamiento"]);
            }
break;
        case 'eliminar':
            $id = $data['id'];
            $obtenerIdAnimal = "SELECT ID_Animal FROM animal_usuario WHERE ID = '$id'";
            $obtener = $conn->query($obtenerIdAnimal);
            if($obtener->num_rows > 0){
                $idAnimal = $obtener->fetch_assoc()["ID_Animal"];
                $actualizar = "UPDATE animal_usuario SET Estado = 0, FechaFin = CURDATE() WHERE ID = '$id'";
                $result = $conn->query($actualizar);
            if($result){
                $liberar = "UPDATE animal SET Apadrinado = 0 WHERE ID_Animal = '$idAnimal'";
                $ejecutar = $conn->query($liberar);
                if($ejecutar){
                    echo json_encode(["status" => "00", "message" => "Apadrinamiento eliminado con exito"]);
            } else {
                echo json_encode(["status" => "99", "message" => "Hubo un error al eliminar el apadrinamiento"]);
            }
            }
          
        }
        break;
        case 'obtenerAnimalesDisponibles':
            $sql = "SELECT * FROM animal WHERE Apadrinado = 0";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $animales=[];
                while($row = $result->fetch_assoc()){
                    $animales[]= [
                        "id"=> $row["ID_Animal"],
                        "nombreAnimal" => $row["Nombre"],
                        "especie" => $row["Especie"],
                        "fechaNacimiento" => $row["Fecha_Nacimiento"],
                    ];
            }
            echo json_encode(["status" => "00", "animales" => $animales]);
        }
        else {
            echo json_encode(["status" => "99", "animales" => []]);
            }
        break;  
        case  'obtenerUsuariosDisponibles':
            $sql = "SELECT a.ID_Usuario, CONCAT(a.Nombre, ' ', a.Apellido1, ' ', a.Apellido2) as NombreCompleto, b.Rol
            FROM usuario a
            INNER JOIN roles b
            ON a.ID_Usuario = b.ID_Usuario
            WHERE b.Rol = 'cliente'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                $usuarios = [];
                while($row = $result->fetch_assoc()){
                    $usuarios[]= [
                        "id"=> $row["ID_Usuario"],
                        "nombre" => $row["NombreCompleto"]
                    ];
                }

                echo json_encode(["status" => "00", "usuarios" => $usuarios]);
        }
        else {
            echo json_encode(["status" => "99", "usuarios" => []]);
            }
            break;
        case 'agregar':
            $idAnimal=$data['idAnimal'];
            $idUsuario = $data['idUsuario'];
            $monto = $data['monto'];
            $frecuencia = $data['frecuencia'];


            $sql="INSERT INTO animal_usuario (ID_Usuario, ID_Animal, FechaApadrinamiento, Monto, Frecuencia, Estado)
            VALUES ('$idUsuario', '$idAnimal', CURDATE(), '$monto', '$frecuencia', 1)";
            $result = $conn->query($sql);
            if($result){
                $actualizar="UPDATE animal SET Apadrinado = 1 WHERE ID_Animal = '$idAnimal'";
                $result = $conn->query($actualizar);
                echo json_encode(["status" => "00", "message" => "Animal apadrinado con éxito"]);
            } else {
                echo json_encode(["status" => "99", "message" => "Error al apadrinar el animal"]);
            }
            break;
        default:
            break;

        
    }    

?>