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
                     "Monto" => $padrino["Monto"]
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
        default:
            break;

        }    

?>