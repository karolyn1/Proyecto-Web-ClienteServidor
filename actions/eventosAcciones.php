<?php
include("conexion.php");
$data = $_POST;
switch($data['action']){
    case 'eliminar':
        $idTour = $data['id'];

        // Verificar si hay registros en usuario_tour
        $sql = "SELECT * FROM usuario_evento WHERE ID_Evento = '$idTour'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            // Si hay registros, desactivamos el tour
            $update = "UPDATE eventos SET Estado = 0 WHERE ID_Evento = '$idTour'";
            $ejec = $conn->query($update);
            if($ejec) {
                echo json_encode(["status" => "00", "message" => "El evento ha sido desactivado correctamente"]);
            } else {
                echo json_encode(["status" => "99", "message" => "El evento no ha sido desactivado correctamente"]);
            }
        } else {
            // Si no hay registros, eliminamos el tour
            $delete = "DELETE FROM eventos WHERE ID_Evento = '$idTour'";  // Corregir DELETE FROM
            $result = $conn->query($delete);
            if($result){
                echo json_encode(["status" => "00", "message" => "El evento ha sido eliminado correctamente"]); 
            } else {
                echo json_encode(["status" => "99", "message" => "Elevento no ha sido eliminado correctamente"]);
            }
        }
        break;
        default:   
        break;
}

   







?>